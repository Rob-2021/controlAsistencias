<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;

class GenerarModelo extends Command
{
    protected $signature = 'generar:modelo {tabla} {--modelo=}';
    protected $description = 'Genera un modelo Eloquent completo con relaciones';

    public function handle()
    {
        $tabla = $this->argument('tabla');
        $modelo = $this->option('modelo') ?? Str::studly(Str::singular($tabla));
        $namespace = 'App\\Models';
        $directorio = app_path('Models');

        $columnas = DB::select("
            SELECT COLUMN_NAME, DATA_TYPE 
            FROM INFORMATION_SCHEMA.COLUMNS 
            WHERE TABLE_NAME = ?", [$tabla]);

        if (empty($columnas)) {
            $this->error("No se encontraron columnas para la tabla '$tabla'.");
            return;
        }

        $primaryKeys = DB::select("
            SELECT COLUMN_NAME 
            FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE 
            WHERE TABLE_NAME = ? AND CONSTRAINT_NAME LIKE 'PK_%'", [$tabla]);
        $primaryKeyComment = '';
        if (count($primaryKeys) > 1) {
            $claves = implode("', '", array_column($primaryKeys, 'COLUMN_NAME'));
            $primaryKeyComment = "// Clave primaria compuesta: ['$claves']";
        }

        // ======= Fillable, Casts, Dates =======
        $fillableArray = [];
        $castsArray = [];
        $datesArray = [];

        foreach ($columnas as $col) {
            $nombre = $col->COLUMN_NAME;
            $tipo = $col->DATA_TYPE;

            $fillableArray[] = $nombre;

            switch ($tipo) {
                case 'int':
                case 'bigint':
                case 'smallint':
                    $castsArray[$nombre] = 'integer';
                    break;
                case 'bit':
                    $castsArray[$nombre] = 'boolean';
                    break;
                case 'decimal':
                case 'numeric':
                case 'float':
                case 'real':
                case 'money':
                    $castsArray[$nombre] = 'float';
                    break;
                case 'date':
                case 'datetime':
                case 'datetime2':
                case 'smalldatetime':
                    $castsArray[$nombre] = 'datetime';
                    $datesArray[] = $nombre;
                    break;
                case 'json':
                    $castsArray[$nombre] = 'array';
                    break;
            }
        }

        $fillable = "'" . implode("', '", $fillableArray) . "'";
        $casts = collect($castsArray)->map(fn($tipo, $campo) => "'$campo' => '$tipo'")->implode(",\n        ");
        $dates = empty($datesArray) ? '' : "'" . implode("', '", $datesArray) . "'";

        // ======= belongsTo (claves foráneas que este modelo tiene) =======
        $belongsTo = DB::select("
            SELECT 
                fk.name AS constraint_name,
                tp.name AS referenced_table,
                c.name AS referenced_column,
                fk.parent_object_id AS table_object_id,
                ref.name AS column_name
            FROM 
                sys.foreign_keys AS fk
            INNER JOIN 
                sys.foreign_key_columns AS fkc ON fk.object_id = fkc.constraint_object_id
            INNER JOIN 
                sys.tables AS tp ON fkc.referenced_object_id = tp.object_id
            INNER JOIN 
                sys.columns AS c ON fkc.referenced_column_id = c.column_id AND tp.object_id = c.object_id
            LEFT JOIN
                sys.tables AS rt ON fkc.parent_object_id = rt.object_id
            LEFT JOIN
                sys.columns AS ref ON fkc.parent_column_id = ref.column_id AND rt.object_id = ref.object_id
            WHERE 
                rt.name = ? AND ref.name IS NOT NULL
        ", [$tabla]);

        //dd($belongsTo); // Esto mostrará lo que devuelve la consulta

// ======= belongsTo (claves foráneas que este modelo tiene) =======
        $belongsToMethods = '';
        foreach ($belongsTo as $rel) {
            // Verificamos que los campos existen en la respuesta
            $referencedTable = $rel->referenced_table ?? null;
            $referencedColumn = $rel->referenced_column ?? null;
            $columnName = $rel->column_name ?? null;

            // Aseguramos que las relaciones existen
            if ($referencedTable && $referencedColumn && $columnName) {
                $relName = Str::camel(Str::singular($referencedTable));
                $relModel = Str::studly(Str::singular($referencedTable));
                $belongsToMethods .= <<<EOT

            public function $relName()
            {
                return \$this->belongsTo($relModel::class, '{$columnName}', '{$referencedColumn}');
            }
        EOT;
            } else {
                $this->error("Relación incompleta en la clave foránea: {$rel->constraint_name}");
            }
        }



        // ======= hasMany (otras tablas que apuntan a este modelo) =======
        $hasMany = DB::select("
            SELECT 
                fk.name AS constraint_name,
                rt.name AS referenced_table,
                c.name AS referenced_column,
                fk.parent_object_id AS table_object_id,
                ref.name AS column_name
            FROM 
                sys.foreign_keys AS fk
            INNER JOIN 
                sys.foreign_key_columns AS fkc ON fk.object_id = fkc.constraint_object_id
            INNER JOIN 
                sys.tables AS rt ON fkc.referenced_object_id = rt.object_id
            INNER JOIN 
                sys.columns AS c ON fkc.referenced_column_id = c.column_id AND rt.object_id = c.object_id
            LEFT JOIN
                sys.tables AS tp ON fkc.parent_object_id = tp.object_id
            LEFT JOIN
                sys.columns AS ref ON fkc.parent_column_id = ref.column_id AND tp.object_id = ref.object_id
            WHERE 
                tp.name = ? AND ref.name IS NOT NULL
        ", [$tabla]);

        $hasManyMethods = '';
        foreach ($hasMany as $rel) {
            $relName = Str::camel(Str::plural($rel->referenced_table)); // Usar 'referenced_table'
            $relModel = Str::studly(Str::singular($rel->referenced_table)); // Usar 'referenced_table'
            $hasManyMethods .= <<<EOT
        
            public function $relName()
            {
                return \$this->hasMany($relModel::class, '{$rel->column_name}');
            }
        EOT;
        }
        

        // ======= belongsToMany (tablas pivote que usan esta tabla) =======
        $pivotCandidates = DB::select("
            SELECT 
                tp.name AS table_name
            FROM 
                sys.tables AS tp
            WHERE 
                tp.name LIKE '%{$tabla}%' AND tp.name NOT IN (SELECT name FROM sys.tables WHERE name = ?)
        ", [$tabla]);

        $belongsToManyMethods = '';
        foreach ($pivotCandidates as $candidate) {
            $pivot = $candidate->table_name;

            $fks = DB::select("
                SELECT 
                    kcu.COLUMN_NAME,
                    t.name AS referenced_table_name
                FROM 
                    INFORMATION_SCHEMA.KEY_COLUMN_USAGE kcu
                INNER JOIN 
                    sys.foreign_key_columns fkc ON fkc.constraint_object_id = OBJECT_ID(kcu.CONSTRAINT_NAME)
                INNER JOIN 
                    sys.tables t ON t.object_id = fkc.referenced_object_id
                WHERE 
                    kcu.TABLE_NAME = ? AND t.name IS NOT NULL
            ", [$pivot]);



            if (count($fks) === 2) {
                $refs = collect($fks)->pluck('REFERENCED_TABLE_NAME')->unique()->values();

                if ($refs->contains($tabla)) {
                    $otra = $refs->first(fn($t) => $t !== $tabla);
                    if ($otra) {
                        $method = Str::camel(Str::plural($otra));
                        $relatedModel = Str::studly(Str::singular($otra));
                        $belongsToManyMethods .= <<<EOT

            public function $method()
            {
                return \$this->belongsToMany($relatedModel::class, '$pivot');
            }
        EOT;
                    }
                }
            }
        }

        // ======= Modelo final =======
        $contenido = <<<PHP
<?php

namespace $namespace;

use Illuminate\Database\Eloquent\Model;

class $modelo extends Model
{
    protected \$table = '$tabla';

    $primaryKeyComment

    protected \$fillable = [$fillable];

    protected \$casts = [
        $casts
    ];

    protected \$dates = [$dates];
$belongsToMethods
$hasManyMethods
$belongsToManyMethods
}
PHP;

        (new Filesystem)->ensureDirectoryExists($directorio);
        file_put_contents("$directorio/$modelo.php", $contenido);

        $this->info("Modelo $modelo generado exitosamente con relaciones, claves compuestas y tablas pivote.");
    }
}
