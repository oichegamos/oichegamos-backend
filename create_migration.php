<?php
require_once 'vendor/autoload.php';
require_once __DIR__.'./bootstrap/app.php';

if (!isset($argv[1])) {
    $modelName = readline("Enter model name: ");
} else {
    $modelName = $argv[1];
}

$modelClass = 'App\\Models\\' . $modelName;

if (!class_exists($modelClass)) {
    die("Model doesn't exist: ".$modelClass);
}

$tableName = strtolower($modelName).'s';

$model = new $modelClass;

$fillable = $model->getFillable();

$migrationClass = 'Create'.ucfirst($tableName).'Table';

if (!class_exists($migrationClass)) {

    $migrationFile = app('path.database') . "/migrations//" . date('Y_m_d_His').'_create_'.$tableName.'_table.php';

    $migrationContent = getMigrationContent($tableName, $fillable, $migrationClass);

    file_put_contents($migrationFile, $migrationContent);

    echo "Migration file created: ".$migrationFile."\n";
} else {
    die("Migration already exists: ".$migrationClass);
}

function getMigrationContent($tableName, $fillable, $migrationClass) {
    $migrationContent = "<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class $migrationClass extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('$tableName', function (Blueprint \$table) {
            \$table->id();";

    foreach ($fillable as $column) {
        if (strpos($column, '_id') !== false) {
            $migrationContent .= "\n            \$table->foreignId('$column')->constrained();";
        } else {
            $migrationContent .= "\n            \$table->string('$column');";
        }
    }

    $migrationContent .= "\n\n            \$table->timestamps();\n        });\n    }\n\n    /**
 * Reverse the migrations.
 *
 * @return void
 */
public function down()
{
    Schema::dropIfExists('$tableName');
}\n}";

    return $migrationContent;
}
