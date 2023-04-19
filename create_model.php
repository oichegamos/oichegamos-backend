<?php

// Verifica se o nome da classe foi passado como argumento
if (isset($argv[1])) {
    $className = $argv[1];
} else {
    // Pergunta qual o nome da classe via prompt
    $className = readline('Digite o nome da classe: ');
}

// Cria o nome das classes que serão geradas
$modelName = $className;
$controllerName = $className . 'Controller';
$serviceName = $className . 'Service';

// Cria os arquivos
createClassFile('app/Models/' . $modelName . '.php', getModelClassContent($modelName));
createClassFile('app/Http/Controllers/' . $controllerName . '.php', getControllerClassContent($controllerName, $modelName, $serviceName));
createClassFile('app/Services/' . $serviceName . '.php', getServiceClassContent($serviceName, $modelName));

echo "As classes foram criadas com sucesso!" . PHP_EOL;

/**
 * Cria um arquivo com o conteúdo passado
 *
 * @param string $filename
 * @param string $content
 * @return void
 */
function createClassFile($filename, $content)
{
    // Verifica se o arquivo já existe
    if (file_exists($filename)) {
        echo "O arquivo {$filename} já existe." . PHP_EOL;
        return;
    }

    // Cria o arquivo
    $handle = fopen($filename, 'w');
    fwrite($handle, $content);
    fclose($handle);
}

/**
 * Retorna o conteúdo da classe Model
 *
 * @param string $modelName
 * @return string
 */
function getModelClassContent($modelName)
{
    return "<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class {$modelName} extends Model
{
    protected \$fillable = [
        '',
    ];

    public function rules(){
        return [
            '' => 'required',
        ];
    }
}
";
}

/**
 * Retorna o conteúdo da classe Controller
 *
 * @param string $controllerName
 * @param string $modelName
 * @param string $serviceName
 * @return string
 */
function getControllerClassContent($controllerName, $modelName, $serviceName)
{
    return "<?php
namespace App\Http\Controllers;

use App\Models\\{$modelName};
use App\Services\\{$serviceName};

class {$controllerName} extends Controller
{
    protected \$model;
    protected \$service;

    public function __construct({$modelName} \$model, {$serviceName} \$service)
    {
        \$this->model = \$model;
        \$this->service = \$service;
    }
}
";
}

/**
 * Retorna o conteúdo da classe Service
 *
 * @param string $serviceName
 * @param string $modelName
 * @return string
 */
function getServiceClassContent($serviceName, $modelName)
{
    return "<?php
namespace App\Services;

use App\Models\\{$modelName};

class {$serviceName}
{
    protected \$model;

    public function __construct({$modelName} \$model)
    {
        \$this->model = \$model;
    }
}
";
}
