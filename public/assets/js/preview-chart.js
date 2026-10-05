(function () {
  const app = document.getElementById('previewChartApp');
  if (!app || typeof window.LightweightCharts === 'undefined') {
    return;
  }

  const apiUrl = app.dataset.apiUrl || '';
  const assetType = app.dataset.assetType || 'stock';
  const chartContainer = document.getElementById('preview-chart');
  const statusEl = document.getElementById('chart-status');
  const errorEl = document.getElementById('chart-error');
  const searchForm = document.getElementById('preview-search-form');
  const input = document.getElementById('symbol-input');

  if (!apiUrl || !chartContainer) {
    return;
  }

  let chart = null;
  let series = null;

  function initChart() {
    chart = LightweightCharts.createChart(chartContainer, {
      autoSize: true,
      height: 500,
      layout: {
        background: { color: '#ffffff' },
        textColor: '#111827'
      },
      grid: {
        vertLines: { color: '#f1f5f9' },
        horzLines: { color: '#f1f5f9' }
      },
      rightPriceScale: { borderColor: '#e2e8f0' },
      timeScale: { borderColor: '#e2e8f0' }
    });

    if (assetType === 'crypto') {
      series = chart.addAreaSeries({
        lineColor: '#2563eb',
        topColor: 'rgba(37, 99, 235, 0.3)',
        bottomColor: 'rgba(37, 99, 235, 0.05)'
      });
    } else {
      series = chart.addCandlestickSeries({
        upColor: '#22c55e',
        downColor: '#ef4444',
        borderVisible: false,
        wickUpColor: '#22c55e',
        wickDownColor: '#ef4444'
      });
    }

    window.addEventListener('resize', function () {
      chart.timeScale().fitContent();
    });
  }

  function showError(message) {
    if (!errorEl) return;
    errorEl.textContent = message;
    errorEl.classList.remove('d-none');
  }

  function clearError() {
    if (!errorEl) return;
    errorEl.textContent = '';
    errorEl.classList.add('d-none');
  }

  function setStatus(message) {
    if (statusEl) {
      statusEl.textContent = message;
    }
  }

  async function loadData() {
    try {
      clearError();
      setStatus('Loading chart data...');
      const response = await fetch(apiUrl, { headers: { Accept: 'application/json' } });
      const payload = await response.json();

      if (!payload || payload.status !== 'success' || !Array.isArray(payload.series)) {
        showError(payload && payload.message ? payload.message : 'Chart data is currently unavailable.');
        setStatus('Unable to load chart data.');
        return;
      }

      series.setData(payload.series);
      chart.timeScale().fitContent();
      setStatus('Last updated: ' + new Date().toLocaleTimeString());
    } catch (error) {
      showError('Unable to load chart data. Please try again shortly.');
      setStatus('Network error while loading chart data.');
    }
  }

  if (searchForm && input) {
    searchForm.addEventListener('submit', function (event) {
      event.preventDefault();
      const raw = (input.value || '').trim();
      if (!raw) {
        return;
      }

      let normalized = raw;
      let targetPrefix = '/Preview/Stock/';

      if (assetType === 'crypto') {
        normalized = raw.toLowerCase().replace(/[^a-z0-9-]/g, '');
        targetPrefix = '/Preview/Crypto/';
      } else if (assetType === 'etf') {
        normalized = raw.toUpperCase().replace(/[^A-Z0-9.-]/g, '');
        targetPrefix = '/Preview/ETF/';
      } else {
        normalized = raw.toUpperCase().replace(/[^A-Z0-9.-]/g, '');
      }

      if (!normalized) {
        return;
      }

      window.location.href = targetPrefix + encodeURIComponent(normalized);
    });
  }

  initChart();
  loadData();
  window.setInterval(loadData, 15000);
})();
