<?php
defined('BASEPATH') || exit('No direct script access allowed');

if (!function_exists('squeeze_json_response')) {
    function squeeze_json_response($data = [], $status_code = 200)
    {
        $ci = get_instance();
        $ci->output
            ->set_status_header($status_code)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($data));
    }
}

if (!function_exists('squeeze_safe_number')) {
    function squeeze_safe_number($value, $default = null)
    {
        if ($value === null || $value === '') {
            return $default;
        }

        if (is_numeric($value)) {
            return $value + 0;
        }

        return $default;
    }
}

if (!function_exists('squeeze_flag_badges')) {
    function squeeze_flag_badges(array $flags)
    {
        $html = '';
        foreach ($flags as $key => $value) {
            if (!$value) {
                continue;
            }
            $label = ucwords(str_replace('_', ' ', $key));
            $html .= '<span class="badge badge-warning squeeze-flag">' . htmlspecialchars($label) . '</span> ';
        }
        return trim($html);
    }
}
