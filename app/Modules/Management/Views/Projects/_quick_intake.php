<?php if(session()->has('success')): ?>
  <div class="alert alert-success"><?= esc(session('success')) ?></div>
<?php endif; ?>
<?php if(session()->has('error')): ?>
  <div class="alert alert-danger"><?= esc(session('error')) ?></div>
<?php endif; ?>

<form class="card p-3" id="reQuickIntake">
  <?= csrf_field(); ?>
  <h5 class="mb-2">Quick Property Intake</h5>
  <p class="text-muted mb-3">Paste a Zillow (or similar) link <em>or</em> type the address.</p>

  <div class="mb-3">
    <label class="form-label">Listing Link</label>
    <input type="url" name="zillow_url" id="zillow_url" class="form-control" placeholder="https://www.zillow.com/homedetails/...">
  </div>

  <div class="text-center my-2">— or —</div>

  <div class="mb-2">
    <label class="form-label">Street Address</label>
    <input name="address_line1" id="address_line1" class="form-control" placeholder="123 Main St">
  </div>
  <div class="row">
    <div class="col-md-4 mb-2"><input name="city" id="city" class="form-control" placeholder="City"></div>
    <div class="col-md-2 mb-2"><input name="state" id="state" maxlength="2" class="form-control" placeholder="ST"></div>
    <div class="col-md-3 mb-2"><input name="postal_code" id="postal_code" class="form-control" placeholder="ZIP"></div>
  </div>

  <div class="d-flex gap-2">
    <button class="btn btn-primary" type="submit">Submit</button>
    <a class="btn btn-light" href="<?= site_url('Management/Projects/quick-intake'); ?>">Standalone Page</a>
  </div>
</form>

<script <?= $nonce['script'] ?? '' ?>>
document.getElementById('reQuickIntake').addEventListener('submit', function(e){
  e.preventDefault();
  const body = {
    zillow_url:    document.getElementById('zillow_url').value.trim(),
    address_line1: document.getElementById('address_line1').value.trim(),
    city:          document.getElementById('city').value.trim(),
    state:         document.getElementById('state').value.trim(),
    postal_code:   document.getElementById('postal_code').value.trim()
  };
  if(!body.zillow_url && !body.address_line1){ alert('Provide a link or an address.'); return; }
  const csrf = document.querySelector('input[name="<?= csrf_token() ?>"]').value;
  fetch('<?= site_url('API/Projects/ingest/real-estate'); ?>', {
    method:'POST',
    headers:{'Content-Type':'application/json','Accept':'application/json','<?= csrf_header() ?>': csrf},
    body: JSON.stringify(body)
  }).then(r=>r.json()).then(d=>{
    if(d.success){ location.reload(); }
    else { alert(d.message || 'Submission failed.'); }
  }).catch(err=>alert('Network error: '+err));
});
</script>