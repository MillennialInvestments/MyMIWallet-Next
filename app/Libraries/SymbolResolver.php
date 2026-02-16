<?php

namespace App\Libraries;

class SymbolResolver
{
    /**
     * Check if a class/trait/interface exists and can be autoloaded.
     */
    public function classExists(string $fqcn): bool
    {
        $fqcn = ltrim(trim($fqcn), '\\');

        return class_exists($fqcn, true)
            || interface_exists($fqcn, true)
            || trait_exists($fqcn, true);
    }

    /**
     * Check if method exists on class (autoload allowed).
     */
    public function methodExists(string $fqcn, string $method): bool
    {
        $fqcn = ltrim(trim($fqcn), '\\');
        $method = trim($method);

        if ($method === '') return false;
        if (!$this->classExists($fqcn)) return false;

        return method_exists($fqcn, $method);
    }

    /**
     * CI4 Services: validate Config\Services has a matching method.
     * We treat "service name" as method name on Config\Services.
     */
    public function serviceExists(string $serviceMethod): bool
    {
        $serviceMethod = trim($serviceMethod);
        if ($serviceMethod === '') return false;

        $svc = '\\Config\\Services';

        if (!$this->classExists($svc)) return false;

        return method_exists($svc, $serviceMethod);
    }

    /**
     * CI4 helper('name') resolves app/Helpers/name_helper.php or system/Helpers/name_helper.php
     * Supports helper(['a','b']): we validate each.
     */
    public function helperExists(string $helperName): bool
    {
        $helperName = trim($helperName, " \t\n\r\0\x0B'\"");

        if ($helperName === '') return false;

        $appPath = APPPATH . 'Helpers/' . $helperName . '_helper.php';
        $sysPath = SYSTEMPATH . 'Helpers/' . $helperName . '_helper.php';

        return is_file($appPath) || is_file($sysPath);
    }
}
