<?php
// Shim to prevent spark failures if CI tries app/Helpers first.
// Delegate to CI system helper if present.
$system = SYSTEMPATH . 'Helpers/kint_helper.php';
if (is_file($system)) {
    require_once $system;
}
