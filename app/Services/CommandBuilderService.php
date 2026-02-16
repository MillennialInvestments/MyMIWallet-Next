<?php

namespace App\Services;

class CommandBuilderService
{
    public function build(array $definition): bool
    {
        $className = $definition['class_name'];
        $commandName = $definition['command_name'];
        $description = $definition['description'];
        $logic = $definition['logic'];

        $stub = $this->generateStub(
            $className,
            $commandName,
            $description,
            $logic
        );

        $path = APPPATH . 'Commands/' . $className . '.php';

        if (file_exists($path)) {
            return false;
        }

        file_put_contents($path, $stub);

        return true;
    }

    protected function generateStub($class, $command, $desc, $logic)
    {
        return <<<PHP
<?php

namespace App\Commands;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class {$class} extends SafeBaseCommand
{
    protected \$group       = 'Custom';
    protected \$name        = '{$command}';
    protected \$description = '{$desc}';

    public function run(array \$params)
    {
        CLI::write("Executing {$command}...");

        foreach (\$definition['service_calls'] as \$call) {
            \$serviceClass = "\\App\\Services\\" . \$call['service'];

            if (!class_exists(\$serviceClass)) {
                CLI::error("Service not found: " . \$call['service']);
                continue;
            }

            \$service = new \$serviceClass();

            call_user_func_array(
                [\$service, \$call['method']],
                \$call['arguments']
            );
        }


        CLI::write("Done.");
    }
}
PHP;
    }
}
