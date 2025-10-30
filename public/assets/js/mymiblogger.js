document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('mymiblogger-form');
  if (!form) return;
  form.addEventListener('submit', (ev) => {
    ev.preventDefault();
    const data = new FormData(form);
    fetch('/Management/Marketing/Blogger/generate', {
      method: 'POST',
      headers: { 'X-Requested-With': 'XMLHttpRequest' },
      body: data
    })
      .then(r => r.json())
      .then(res => {
        const container = document.getElementById('mymiblogger-cards');
        if (container && res.data && res.data.blocks) {
          container.innerHTML = '';
          res.data.blocks.forEach(b => {
            const card = document.createElement('div');
            card.className = 'mymiblogger-card';
            card.innerHTML = `<h6>${b.title}</h6><p>${b.excerpt}</p>`;
            container.appendChild(card);
          });
        }
        const csrf = form.querySelector('input[name="csrf_token"]');
        if (csrf && res.csrf) csrf.value = res.csrf;
      });
  });
});