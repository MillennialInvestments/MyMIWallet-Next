// app/Helpers/viewfix_helper.php
<?php
if (! function_exists('safe_view')) {
    function safe_view(string $name, array $data = [], array $options = []): string
    {
        // normalize
        $name = preg_replace('#^app/Views/#', '', $name); // strip prefix
        $name = str_replace('\\', '/', $name);            // backslashes → slashes
        $name = preg_replace('#\.php$#', '', $name);      // drop .php if present
        return view($name, $data, $options);
    }
}
