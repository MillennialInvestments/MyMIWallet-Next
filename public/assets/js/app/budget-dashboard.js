import { fetchJSON } from '/assets/js/app/fetch-helper.js';

function shouldBootBudgetDashboard() {
  return document.querySelector('[data-budget-dashboard]') !== null;
}

function getBudgetEndpoints() {
  const el = document.querySelector('[data-budget-dashboard]');

  if (!el) {
    return null;
  }

  return {
    budgetData: el.dataset.endpointBudgetData || '',
    creditData: el.dataset.endpointCreditData || '',
    availableData: el.dataset.endpointAvailableData || '',
    repaymentSummary: el.dataset.endpointRepaymentSummary || ''
  };
}

async function fetchAllBudgetData() {
  const endpoints = getBudgetEndpoints();

  if (!endpoints) {
    console.warn('⚠️ Budget dashboard container not found.');
    return null;
  }

  try {
    const [budgetData, creditData, availableData, repaymentSummary] = await Promise.all([
      fetchJSON(endpoints.budgetData),
      fetchJSON(endpoints.creditData),
      fetchJSON(endpoints.availableData),
      fetchJSON(endpoints.repaymentSummary)
    ]);

    const payload = {
      budgetData,
      creditData,
      availableData,
      repaymentSummary
    };

    window.budgetDashboardData = payload;
    document.dispatchEvent(new CustomEvent('budget:data-loaded', { detail: payload }));

    return payload;
  } catch (error) {
    console.error('⚠️ Budget fetch failure:', error);
    throw error;
  }
}

document.addEventListener('DOMContentLoaded', async () => {
  if (!shouldBootBudgetDashboard()) {
    return;
  }

  try {
    await fetchAllBudgetData();
  } catch (error) {
    console.error('⚠️ Budget dashboard initialization failed:', error);
  }
});

export { fetchAllBudgetData };