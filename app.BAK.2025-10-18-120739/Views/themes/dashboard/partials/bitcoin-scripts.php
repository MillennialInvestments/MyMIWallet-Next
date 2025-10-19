<?php
// Bundled Bitcoin helpers are included in the main Vite build. This partial
// exists for legacy views that do not render the standard dashboard layout.
$nonce = $nonce ?? ['script' => null];
echo vite_tags('app', $nonce['script'] ?? null);
?>
