<?php /** @var array $block */ ?>
<div class="mymiblogger-card" data-id="<?= esc($block['id'] ?? '') ?>">
    <h6><?= esc($block['title'] ?? '') ?></h6>
    <p><?= esc($block['excerpt'] ?? '') ?></p>
    <button class="btn btn-sm btn-secondary mymiblogger-preview" data-id="<?= esc($block['id'] ?? '') ?>">Preview</button>
</div>