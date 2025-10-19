<div class="my-4">
  <div class="alert alert-info text-center shadow-sm">
    [ Advertisement Slot – <?= esc($slotLabel ?? 'Promote MyMI Tools or Partners') ?> ]
    <?php if (!empty($ctaButton)) : ?>
      <div class="mt-2">
        <a href="<?= esc($ctaLink) ?>" class="btn btn-outline-primary btn-sm"><?= esc($ctaButton) ?></a>
      </div>
    <?php endif; ?>
  </div>
</div>
