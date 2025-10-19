<div class="card card-bordered h-100">
    <div class="card-inner">
        <div class="card-title-group align-start mb-3">
            <div class="card-title">
                <h6 class="title">Budget Settings - <?= ucwords($budgetType) ?></h6>
                <p>Configure your <?= strtolower($budgetType) ?> preferences below.</p>
            </div>
        </div>
        <div class="nk-block">
            <div class="row">
                <div class="col-12">
                    <form id="budget-settings-form" action="<?= site_url('budget/settings/save') ?>" method="post">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                        <!-- Income Settings -->
                        <?php if ($budgetType == 'Income'): ?>
                            <div class="form-group mb-3">
                                <label for="primaryIncomeSource" class="form-label">Primary Income Source</label>
                                <input type="text" class="form-control" id="primaryIncomeSource" name="primaryIncomeSource" placeholder="e.g., Salary, Business" value="<?= $settingsData['primaryIncomeSource'] ?? '' ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label for="incomeFrequency" class="form-label">Income Frequency</label>
                                <select class="form-control" id="incomeFrequency" name="incomeFrequency">
                                    <option value="weekly" <?= $settingsData['incomeFrequency'] == 'weekly' ? 'selected' : '' ?>>Weekly</option>
                                    <option value="bi-weekly" <?= $settingsData['incomeFrequency'] == 'bi-weekly' ? 'selected' : '' ?>>Bi-weekly</option>
                                    <option value="monthly" <?= $settingsData['incomeFrequency'] == 'monthly' ? 'selected' : '' ?>>Monthly</option>
                                    <option value="quarterly" <?= $settingsData['incomeFrequency'] == 'quarterly' ? 'selected' : '' ?>>Quarterly</option>
                                    <option value="semi-annually" <?= $settingsData['incomeFrequency'] == 'semi-annually' ? 'selected' : '' ?>>Semi-annually</option>
                                    <option value="annually" <?= $settingsData['incomeFrequency'] == 'annually' ? 'selected' : '' ?>>Annually</option>
                                </select>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="automaticIncomeTracking" name="automaticIncomeTracking" <?= $settingsData['automaticIncomeTracking'] ? 'checked' : '' ?>>
                                <label class="form-check-label" for="automaticIncomeTracking">Automatic Income Tracking</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="incomeNotifications" name="incomeNotifications" <?= $settingsData['incomeNotifications'] ? 'checked' : '' ?>>
                                <label class="form-check-label" for="incomeNotifications">Income Notifications</label>
                            </div>
                            <div class="form-group mb-3">
                                <label for="incomeCategories" class="form-label">Income Categories</label>
                                <select multiple class="form-control" id="incomeCategories" name="incomeCategories[]">
                                    <option value="salary">Salary</option>
                                    <option value="business">Business</option>
                                    <option value="investments">Investments</option>
                                    <option value="rental">Rental Income</option>
                                    <option value="freelancing">Freelancing</option>
                                    <option value="dividends">Dividends</option>
                                    <option value="interest">Interest</option>
                                    <option value="pension">Pension</option>
                                    <option value="social security">Social Security</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        <?php endif; ?>

                        <!-- Expense Settings -->
                        <?php if ($budgetType == 'Expenses'): ?>
                            <div class="form-group mb-3">
                                <label for="expenseTrackingMode" class="form-label">Expense Tracking Mode</label>
                                <select id="expenseTrackingMode" name="expenseTrackingMode" class="form-select">
                                    <option value="automatic" <?= $settingsData['expenseTrackingMode'] == 'automatic' ? 'selected' : '' ?>>Automatic</option>
                                    <option value="manual" <?= $settingsData['expenseTrackingMode'] == 'manual' ? 'selected' : '' ?>>Manual</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="monthlyBudgetLimit" class="form-label">Monthly Budget Limit</label>
                                <input type="number" id="monthlyBudgetLimit" name="monthlyBudgetLimit" class="form-control" value="<?= $settingsData['monthlyBudgetLimit'] ?? 0 ?>">
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" id="criticalExpenseAlerts" name="criticalExpenseAlerts" class="form-check-input" <?= $settingsData['criticalExpenseAlerts'] ? 'checked' : '' ?>>
                                <label for="criticalExpenseAlerts" class="form-check-label">Critical Expense Alerts</label>
                            </div>
                            <div class="form-group mb-3">
                                <label for="recurringExpenses" class="form-label">Recurring Expenses</label>
                                <select multiple id="recurringExpenses" name="recurringExpenses[]" class="form-select">
                                    <option value="rent">Rent/Mortgage</option>
                                    <option value="utilities">Utilities</option>
                                    <option value="subscriptions">Subscriptions</option>
                                    <option value="insurance">Insurance</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="expenseCategories" class="form-label">Expense Categories</label>
                                <select multiple id="expenseCategories" name="expenseCategories[]" class="form-select">
                                    <option value="housing">Housing</option>
                                    <option value="transportation">Transportation</option>
                                    <option value="food">Food</option>
                                    <option value="utilities">Utilities</option>
                                    <option value="insurance">Insurance</option>
                                    <option value="healthcare">Healthcare</option>
                                    <option value="entertainment">Entertainment</option>
                                    <option value="education">Education</option>
                                    <option value="clothing">Clothing</option>
                                    <option value="miscellaneous">Miscellaneous</option>
                                </select>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Add more sections (Investments, Credit/Debt) based on budgetType -->

                        <div class="row">
                            <div class="col-6 px-1">
                                <a class="btn btn-secondary btn-block" href="<?= site_url('/Budget/' . $budgetType) ?>">Cancel</a>
                            </div>
                            <div class="col-6 px-1">
                                <button type="submit" class="btn btn-primary btn-block">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
