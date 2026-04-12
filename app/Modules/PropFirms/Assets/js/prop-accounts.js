(function () {
  const root = document.getElementById('prop-accounts-app');
  if (!root) return;

  const form = document.getElementById('account-form');
  const resetBtn = document.getElementById('account-reset');

  const collectPayload = () => ({
    account_ref: document.getElementById('account-ref').value,
    prop_firm_id: document.getElementById('prop-firm-id').value,
    prop_rule_set_id: document.getElementById('prop-rule-set-id').value,
    platform: document.getElementById('platform').value,
    account_type: document.getElementById('account-type').value,
    account_size: document.getElementById('account-size').value,
    starting_balance: document.getElementById('starting-balance').value,
    current_balance: document.getElementById('current-balance').value,
    initial_daily_loss_limit: document.getElementById('initial-dll').value,
    account_status: document.getElementById('account-status').value,
  });

  const resetForm = () => {
    document.getElementById('account-id').value = '';
    form.reset();
  };

  if (resetBtn) resetBtn.addEventListener('click', resetForm);

  form.addEventListener('submit', async (event) => {
    event.preventDefault();
    const id = document.getElementById('account-id').value;
    const url = id ? `/PropFirms/Accounts/${id}` : '/PropFirms/Accounts';
    const method = id ? 'PUT' : 'POST';

    const response = await fetch(url, {
      method,
      headers: { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
      body: JSON.stringify(collectPayload()),
    });

    if (response.ok) window.location.reload();
  });

  document.querySelectorAll('#account-table .js-edit').forEach((button) => {
    button.addEventListener('click', async () => {
      const id = button.closest('tr').dataset.id;
      const response = await fetch(`/PropFirms/Accounts/${id}`);
      const payload = await response.json();
      const row = payload.data || {};
      const metadata = JSON.parse(row.metadata_json || '{}');

      document.getElementById('account-id').value = row.id || '';
      document.getElementById('account-ref').value = row.account_ref || '';
      document.getElementById('prop-firm-id').value = row.prop_firm_id || '';
      document.getElementById('prop-rule-set-id').value = row.prop_rule_set_id || '';
      document.getElementById('platform').value = metadata.platform || 'tradovate';
      document.getElementById('account-type').value = metadata.account_type || 'eval';
      document.getElementById('account-size').value = metadata.account_size || row.starting_balance || 0;
      document.getElementById('starting-balance').value = row.starting_balance || 0;
      document.getElementById('current-balance').value = row.current_balance || 0;
      document.getElementById('initial-dll').value = metadata.initial_daily_loss_limit || 0;
      document.getElementById('account-status').value = row.account_status || 'active';
    });
  });

  document.querySelectorAll('#account-table .js-delete').forEach((button) => {
    button.addEventListener('click', async () => {
      const id = button.closest('tr').dataset.id;
      await fetch(`/PropFirms/Accounts/${id}`, { method: 'DELETE', headers: { 'X-Requested-With': 'XMLHttpRequest' } });
      window.location.reload();
    });
  });

  document.querySelectorAll('#account-table .js-refresh').forEach((button) => {
    button.addEventListener('click', async () => {
      const id = button.closest('tr').dataset.id;
      const response = await fetch(`/PropFirms/Accounts/${id}/refresh-state`, { method: 'POST' });
      const payload = await response.json();
      alert(`Risk state: ${payload?.data?.risk_state ?? 'unknown'}`);
    });
  });

  document.querySelectorAll('#account-table .js-connect').forEach((button) => {
    button.addEventListener('click', async () => {
      const id = button.closest('tr').dataset.id;
      await fetch(`/PropFirms/Accounts/${id}/connect-broker`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ broker_name: 'tradovate', label: 'Dashboard Connect' }),
      });
      alert('Broker connected');
    });
  });
})();
