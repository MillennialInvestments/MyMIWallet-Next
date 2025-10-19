<?php /** @var array $created */ /** @var array $issues */ ?>
<h2 class="mb-3">Wallet Reconciliation</h2>

<h4>Created subsidiary rows</h4>
<?php if (empty($created)): ?>
  <p>None created.</p>
<?php else: ?>
  <table class="table table-sm">
    <thead><tr><th>wallet_id</th><th>subsidiary</th><th>new id</th></tr></thead>
    <tbody>
      <?php foreach ($created as $c): ?>
        <tr>
          <td><?=esc($c['wallet_id'])?></td>
          <td><?=esc($c['subsidiary'])?></td>
          <td><?=esc($c['id'])?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>

<h4 class="mt-4">Rows with missing info</h4>
<?php if (empty($issues)): ?>
  <p>None.</p>
<?php else: ?>
  <table class="table table-sm">
    <thead><tr><th>wallet_id</th><th>subsidiary</th><th>row id</th><th>user_id</th><th>missing fields</th><th>actions</th></tr></thead>
    <tbody>
      <?php foreach ($issues as $i): ?>
        <?php
          $editType = [
            'bank'=>'editBankAccount',
            'credit'=>'editCreditAccount',
            'debt'=>'editDebtAccount',
            'investment'=>'editInvestAccount',
            'crypto'=>'editCryptoAccount',
          ][$i['subsidiary']] ?? 'editBankAccount';

          // Your modal URL pattern (adjust to your actual route/JS)
          $editUrl = site_url("Dashboard/Transaction-Modal/Edit/{$editType}/{$i['wallet_id']}");
        ?>
        <tr>
          <td><?=esc($i['wallet_id'])?></td>
          <td><?=esc($i['subsidiary'])?></td>
          <td><?=esc($i['id'])?></td>
          <td><?=esc($i['user_id'])?></td>
          <td><?=esc(implode(', ', $i['missing']))?></td>
          <td>
            <a class="btn btn-sm btn-primary" href="<?=$editUrl?>" target="_blank">Open Edit</a>
            <form method="post" action="<?=site_url('Management/Wallets/NotifyUser')?>" style="display:inline-block;">
              <?=csrf_field()?>
              <input type="hidden" name="user_id" value="<?=esc($i['user_id'])?>">
              <input type="hidden" name="wallet_id" value="<?=esc($i['wallet_id'])?>">
              <input type="hidden" name="edit_url" value="<?=esc($editUrl)?>">
              <button class="btn btn-sm btn-outline-secondary">Email User</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>
