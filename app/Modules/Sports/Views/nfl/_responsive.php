<?php
/*
 * Portrait layout for the sports tables. Each table marked .sports-stack
 * turns into one card per row below 768px (phones), and .sports-stack-lg
 * does the same below 992px (tablets held upright), with the column name
 * shown beside each value from the cell's data-label. Nothing has to scroll
 * sideways; wider screens keep the normal table.
 */
$stackRules = static function (string $c): string {
    return <<<CSS
    .{$c} thead { display: none; }
    .{$c}, .{$c} tbody, .{$c} tr { display: block; width: 100%; }
    .{$c} tr { border-bottom: 1px solid var(--bs-border-color, #dee2e6); padding: .5rem .75rem; }
    .{$c} tr:last-child { border-bottom: 0; }
    .{$c} td { border: 0 !important; padding: .2rem 0 !important; text-align: right !important; display: flex; width: 100%; justify-content: space-between; gap: 1rem; background: transparent; box-shadow: none; word-break: normal; overflow-wrap: anywhere; }
    .{$c} td::before { content: attr(data-label); font-weight: 600; text-align: left; color: var(--bs-secondary-color, #6c757d); flex: 0 0 auto; max-width: 50%; }
    .{$c} td:not([data-label])::before { content: none; }
    .{$c} td.sports-stack-title { font-weight: 700; font-size: 1.05rem; justify-content: flex-start; text-align: left !important; }
    .{$c} td.sports-stack-action { display: block; }
    .{$c} td.sports-stack-action .btn { width: 100%; }
    .{$c} tr.table-success { background: rgba(25, 135, 84, .12); }

CSS;
};
?>
<style <?= csp_style_nonce() ?>>
#sports-rb-props th, #sports-rb-player th { white-space: nowrap; }
@media (max-width: 991.98px) {
<?= $stackRules('sports-stack-lg') ?>
    #sports-goldilocks-form button[type=submit] { width: 100%; }
}
@media (max-width: 767.98px) {
<?= $stackRules('sports-stack') ?>
    #sports-rb-props, #sports-rb-player { padding-left: .5rem; padding-right: .5rem; }
    #sports-rb-player h1 small { display: block; margin-top: .25rem; }
}
</style>
