import { fetchJSON } from '/assets/js/app/fetch-helpers.js';

function hasBudgetDashboard() {
  return document.querySelector('[data-budget-dashboard]') !== null;
}

async function fetchAllBudgetData() {
  try {
    const [available, budget, credit, repayment] = await Promise.all([
      fetchJSON('/API/Budget/Available'),
      fetchJSON('/API/Budget/Data'),
      fetchJSON('/API/Budget/Credit'),
      fetchJSON('/API/Budget/Repayment')
    ]);

    const payload = { available, budget, credit, repayment };
    window.MyMIBudget = Object.assign(window.MyMIBudget || {}, payload);
    document.dispatchEvent(new CustomEvent('mymi:budget-data-ready', { detail: payload }));
  } catch (error) {
    console.error('⚠️ Budget fetch failure:', error);
    document.dispatchEvent(new CustomEvent('mymi:budget-data-error', { detail: error }));
  }
}

if (hasBudgetDashboard()) {
  fetchAllBudgetData();
}

export { fetchAllBudgetData };