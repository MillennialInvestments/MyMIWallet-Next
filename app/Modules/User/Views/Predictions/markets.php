<?php
$nonce = $nonce ?? ['style'=>'','script'=>''];
$filters = $filters ?? [];
?>
<style<?=$nonce['style']?? ''?>>
.card.pred { border-color:#84b8ff }
.badge-open { background:#28a745 }
.badge-locked { background:#ffc107 }
.badge-resolved { background:#17a2b8 }
</style>

<div class="container py-4">
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h1 class="mb-0">Prediction Markets</h1>
    <form class="d-flex gap-2" method="get">
      <input class="form-control" name="q" value="<?=esc($filters['search']??'')?>" placeholder="Search...">
      <select class="form-select" name="state">
        <option value="">Any State</option>
        <?php foreach (['OPEN','LOCKED','RESOLVED','CANCELED'] as $s): ?>
          <option value="<?=$s?>" <?=$filters['state']===$s?'selected':''?>><?=$s?></option>
        <?php endforeach; ?>
      </select>
      <select class="form-select" name="category">
        <option value="">Any Category</option>
        <?php foreach (['Crypto','Stocks','Sports','Macros'] as $c): ?>
          <option value="<?=$c?>" <?=$filters['category']===$c?'selected':''?>><?=$c?></option>
        <?php endforeach; ?>
      </select>
      <button class="btn btn-primary">Filter</button>
    </form>
  </div>

  <?php if (empty($markets)): ?>
    <div class="alert alert-info">No markets match your filters yet. Try broadening your search.</div>
  <?php else: ?>
    <div class="row g-3">
      <?php foreach ($markets as $m):
        $state = strtolower($m['state']);
        $badge = $state==='open'?'badge-open':($state==='locked'?'badge-locked':($state==='resolved'?'badge-resolved':'bg-secondary'));
      ?>
      <div class="col-md-4">
        <div class="card pred h-100">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <h5 class="card-title mb-1"><?=esc($m['title'])?></h5>
              <span class="badge <?=$badge?> text-white"><?=esc($m['state'])?></span>
            </div>
            <div class="small text-muted mb-2">Locks: <?=esc($m['lock_at'] ?? 'TBA')?> · Cat: <?=esc($m['category'] ?? '—')?></div>
            <p class="card-text"><?=esc(mb_strimwidth($m['description'] ?? '',0,120,'…'))?></p>
            <a class="btn btn-primary" href="<?=site_url('Predictions/Market/'.$m['id'])?>">View</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>