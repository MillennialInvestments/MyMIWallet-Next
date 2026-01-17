import { fetchJSON } from '/assets/js/app/fetch-helper.js';

function hasBudgetDashboard() {
  return document.querySelector('[data-budget-dashboard]') !== null;
}

async function fetchAllBudgetData() {
  try {
    const [budget, credit, available, repayment] = await Promise.all([
      fetchJSON('/API/Budget/getUserBudgetRecords'),
      fetchJSON('/API/Budget/getUserCreditBalances'),
      fetchJSON('/API/Budget/getUserAvailableBalances'),
      fetchJSON('/API/Budget/getUserRepaymentSummary')
    ]);


    const payload = {
      budget,
      credit,
      available,
      repayment,
    };
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