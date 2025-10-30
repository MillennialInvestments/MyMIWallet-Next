(function () {
  'use strict';

  const input = document.querySelector('[data-global-search-input]');
  const form = document.querySelector('[data-global-search-form]');
  const list = document.querySelector('[data-global-search-suggest]');

  if (!input || !form || !list) {
    return;
  }

  const baseUrl = (document.body && document.body.dataset.baseUrl) ? document.body.dataset.baseUrl : '';
  const endpoint = `${baseUrl}API/Investments/searchTickers`;
  let debounceTimer = null;
  let lastQuery = '';

  function clearList() {
    list.innerHTML = '';
    list.classList.add('d-none');
  }

  function render(items) {
    list.innerHTML = '';

    items.slice(0, 8).forEach((item) => {
      if (!item || !item.symbol) {
        return;
      }

      const anchor = document.createElement('a');
      anchor.className = 'list-group-item list-group-item-action';
      anchor.href = `${baseUrl}Investments/Symbol/${encodeURIComponent(item.symbol)}`;
      const label = item.name ? `${item.symbol} — ${item.name}` : item.symbol;
      anchor.textContent = label;
      list.appendChild(anchor);
    });

    list.classList.toggle('d-none', items.length === 0);
  }

  async function fetchSuggestions(query) {
    try {
      const url = `${endpoint}?query=${encodeURIComponent(query)}&limit=10`;
      const response = await fetch(url, { credentials: 'same-origin' });

      if (!response.ok) {
        clearList();
        return;
      }

      const payload = await response.json();

      if (query !== lastQuery) {
        return;
      }

      render(Array.isArray(payload.data) ? payload.data : []);
    } catch (error) {
      clearList();
    }
  }

  input.addEventListener('input', () => {
    const query = input.value.trim();
    lastQuery = query;

    if (query.length < 1) {
      clearList();
      return;
    }

    window.clearTimeout(debounceTimer);
    debounceTimer = window.setTimeout(() => {
      fetchSuggestions(query);
    }, 200);
  });

  input.addEventListener('focus', () => {
    if (list.children.length > 0) {
      list.classList.remove('d-none');
    }
  });

  document.addEventListener('click', (event) => {
    if (!list.contains(event.target) && event.target !== input) {
      clearList();
    }
  });

  form.addEventListener('submit', (event) => {
    const query = input.value.trim();

    if (!query) {
      event.preventDefault();
      clearList();
      return;
    }

    form.action = `${baseUrl}Search`;
  });
})();