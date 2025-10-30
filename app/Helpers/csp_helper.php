<?php
// app/Helpers/csp_helper.php
if (! function_exists('csp_nonce')) {
    function csp_nonce(): string
    {
        $data = \Config\Services::renderer()->getData();
        return isset($data['cspNonce']) ? (string)$data['cspNonce'] : '';
    }
}

if (! function_exists('script_nonce_attr')) {
    function script_nonce_attr(): string
    {
        $n = csp_nonce();
        return $n !== '' ? ' nonce="' . esc($n, 'attr') . '"' : '';
    }
}

if (! function_exists('style_nonce_attr')) {
    function style_nonce_attr(): string
    {
        $n = csp_nonce();
        return $n !== '' ? ' nonce="' . esc($n, 'attr') . '"' : '';
    }
}
if (! function_exists('csp_meta_tag')) {
    function csp_meta_tag(): string
    {
        $csp = \Config\Services::csp();
        return $csp->getMetaTag();
    }
}