<?php
$nonce = $nonce ?? ['style'=>'','script'=>''];
$positions = $positions ?? [];
?>
<div class="container py-4">
  <h2 class="mb-3">My Portfolio</h2>
  <div class="card card-bordered">
    <div class="card-inner">
      <div class="table-responsive">
        <table class="table table-striped" id="predPortfolioTable">
          <thead>
            <tr>
              <th>Market</th><th>Option</th><th>Stake Asset</th><th>Stake Total</th><th>Max Payout</th><th>Avg Odds</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach (($positions ?? []) as $p): ?>
            <tr>
              <td><?=esc($p['market_id'])?></td>
              <td><?=esc($p['option_id'])?></td>
              <td><?=esc($p['stake_asset'])?></td>
              <td><?=number_format((float)$p['stake_total'],8)?></td>
              <td><?=number_format((float)$p['payout_max'],8)?></td>
              <td><?=number_format(((int)$p['avg_entry_odds_bips'])/100,2)?>%</td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script<?=$nonce['script']?? ''?>>document.addEventListener('DOMContentLoaded',function(){
  var el=document.getElementById('predPortfolioTable');
  if(!el) return;
  var cfg={paging:true,searching:true,ordering:true,order:[[0,'desc']],lengthMenu:[[25,50,100,-1],[25,50,100,'All']],info:true};
  if(window.jQuery && (jQuery.fn.DataTable||jQuery.fn.dataTable)){ jQuery.fn.dataTable.isDataTable(el)||jQuery(el).DataTable(cfg); }
});</script>