<?php $returnRow = $return ?? []; ?>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h3>Edit Return #<?= esc($returnRow['id']); ?></h3>
            <p class="text-muted">Period <?= esc($returnRow['filing_period_start']); ?> → <?= esc($returnRow['filing_period_end']); ?> · Due <?= esc($returnRow['due_date']); ?></p>
        </div>
        <div class="btn-group">
            <a class="btn btn-outline-secondary" href="/Tax/view/<?= esc($returnRow['id']); ?>">View Summary</a>
            <a class="btn btn-outline-secondary" href="/Tax/export/json/<?= esc($returnRow['id']); ?>">Export JSON</a>
            <a class="btn btn-outline-secondary" href="/Tax/export/csv/<?= esc($returnRow['id']); ?>">Export CSV</a>
        </div>
    </div>

    <?php if (!empty($returnRow['file_date']) && $returnRow['file_date'] > $returnRow['due_date']): ?>
        <div class="alert alert-warning mt-3">
            <strong>Delinquency warning:</strong> The file date is after the due date.
        </div>
    <?php endif; ?>

    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Lines 1–12, 26</span>
                    <button class="btn btn-sm btn-outline-primary" id="recalcReturn" data-return-id="<?= esc($returnRow['id']); ?>">Recalculate</button>
                </div>
                <div class="card-body">
                    <form id="lineForm">
                        <input type="hidden" name="return_id" value="<?= esc($returnRow['id']); ?>">
                        <?php foreach ($lines as $line): ?>
                            <div class="mb-3 row align-items-center">
                                <label class="col-sm-6 col-form-label">
                                    Line <?= esc($line['line_number']); ?>: <?= esc($line['label']); ?>
                                    <?php if (!empty($line['calc_rule'])): ?>
                                        <span class="text-muted d-block small">Rule: <?= esc($line['calc_rule']); ?></span>
                                    <?php endif; ?>
                                </label>
                                <div class="col-sm-3">
                                    <input type="number" step="0.01" name="amount[<?= esc($line['line_number']); ?>]" value="<?= esc($line['value']); ?>" class="form-control line-input" data-line-number="<?= esc($line['line_number']); ?>" <?= $line['type'] === 'calc' ? 'readonly' : ''; ?>>
                                </div>
                                <div class="col-sm-3">
                                    <?php if ((int) ($line['requires_explain'] ?? 0) === 1): ?>
                                        <input type="text" name="explain[<?= esc($line['line_number']); ?>]" placeholder="Explanation" value="<?= esc($line['explain_text']); ?>" class="form-control explain-input" data-line-number="<?= esc($line['line_number']); ?>">
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Jurisdictions</div>
                <div class="card-body">
                    <?= view('App\\Modules\\User\\Tax\\Views\\partials\\jurisdiction_tiles', ['jurisdictions' => $jurisdictions]); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function saveLine(returnId, lineNumber, amount, explainText) {
        return fetch('/Tax/ajax/saveLine', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: new URLSearchParams({
                return_id: returnId,
                line_number: lineNumber,
                amount: amount,
                explain_text: explainText || ''
            })
        }).then(resp => resp.json());
    }

    document.querySelectorAll('.line-input').forEach(input => {
        input.addEventListener('change', async (event) => {
            const lineNumber = event.target.dataset.lineNumber;
            const returnId = <?= esc($returnRow['id']); ?>;
            const explain = document.querySelector(`.explain-input[data-line-number="${lineNumber}"]`)?.value;
            const result = await saveLine(returnId, lineNumber, event.target.value, explain);
            if (result?.calc) {
                updateCalcLines(result.calc);
            }
        });
    });

    document.getElementById('recalcReturn')?.addEventListener('click', async (event) => {
        const returnId = event.target.dataset.returnId;
        const resp = await fetch(`/Tax/ajax/recalc/${returnId}`);
        const data = await resp.json();
        updateCalcLines(data);
    });

    document.querySelectorAll('.jurisdiction-taxable').forEach(input => {
        input.addEventListener('change', async (event) => {
            const allocationId = event.target.dataset.id;
            const taxable = event.target.value;
            const returnId = <?= esc($returnRow['id']); ?>;
            const resp = await fetch('/Tax/ajax/saveAllocation', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: new URLSearchParams({
                    return_id: returnId,
                    allocation_id: allocationId,
                    taxable_amount: taxable,
                })
            });
            const data = await resp.json();
            if (data?.calc) {
                updateCalcLines(data.calc);
                const taxDueInput = event.target.parentElement.nextElementSibling.querySelector('input');
                if (taxDueInput) {
                    taxDueInput.value = data.allocation?.tax_due ?? taxDueInput.value;
                }
            }
        });
    });

    function updateCalcLines(calc) {
        if (!calc) return;
        const line11 = document.querySelector('.line-input[data-line-number="11"]');
        const line12 = document.querySelector('.line-input[data-line-number="12"]');
        const line26 = document.querySelector('.line-input[data-line-number="26"]');
        if (line11) line11.value = calc.line11 ?? line11.value;
        if (line12) line12.value = calc.line12 ?? line12.value;
        if (line26) line26.value = calc.line26 ?? line26.value;
    }
</script>
