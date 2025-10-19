<div class="nk-block">
    <div class="card card-bordered">
        <div class="card-inner">
            <h5 class="card-title">Company Logos</h5>
            <table class="table table-striped" id="logosTable">
                <thead>
                    <tr>
                        <th>Symbol</th>
                        <th>Logo</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($approvedLogos)): ?>
                        <?php foreach ($approvedLogos as $logo): ?>
                            <tr>
                                <td><?= esc($logo['symbol']); ?></td>
                                <td><img src="<?= esc($logo['image_url']); ?>" alt="Logo" style="width: 50px; height: auto;"></td>
                                <td><em class="icon ni ni-check text-success"></em><span>Approved</span></td>
                                <td></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if (!empty($missingSymbols)): ?>
                        <?php foreach ($missingSymbols as $symbolData): ?>
                            <tr data-symbol="<?= esc($symbolData['symbol']); ?>">
                                <td><?= esc($symbolData['symbol']); ?></td>
                                <td>--</td>
                                <td>
                                    <?php if (isset($symbolData['status']) && $symbolData['status'] === 0): ?>
                                        <em class="icon ni ni-alert-circle text-warning"></em><span>Pending Approval</span>
                                    <?php else: ?>
                                        <em class="icon ni ni-cross-circle text-danger"></em><span>Missing</span>
                                    <?php endif; ?>
                                </td>
                                <td><button class="btn btn-primary btn-fetch-logo">Fetch Logo</button></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <button id="fetchAllMissing" class="btn btn-secondary mt-3">Fetch All Missing Logos</button>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
    const fetchButton = document.getElementById('fetchAllMissing');
    const fetchLogoButtons = document.querySelectorAll('.btn-fetch-logo');

    // Get CSRF token dynamically from meta tag
    const csrfMeta = document.querySelector('meta[name="' + window.CSRF_TOKEN.name + '"]');
    let csrfTokenName = window.CSRF_TOKEN.name;
    let csrfTokenHash = csrfMeta ? csrfMeta.getAttribute('content') : window.CSRF_TOKEN.hash;

    // Update CSRF token dynamically on each AJAX call
    const updateCSRFToken = (xhr) => {
        const newCsrfName = xhr.getResponseHeader('X-CSRF-Token-Name');
        const newCsrfHash = xhr.getResponseHeader('X-CSRF-Token-Hash');
        if (newCsrfName && newCsrfHash) {
            csrfTokenName = newCsrfName;
            csrfTokenHash = newCsrfHash;
            if (csrfMeta) {
                csrfMeta.setAttribute('content', csrfTokenHash);
            }
            window.CSRF_TOKEN.name = csrfTokenName;
            window.CSRF_TOKEN.hash = csrfTokenHash;
        }
    };

    fetchButton.addEventListener('click', async function () {
        const symbols = Array.from(document.querySelectorAll('tr[data-symbol]'))
            .map(row => row.getAttribute('data-symbol'));

        if (!symbols.length) {
            console.error('No symbols found to process.');
            return;
        }

        try {
            const response = await fetch('<?= site_url('/Management/Marketing/fetchMissingLogos') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "<?= csrf_hash(); ?>" // Include CSRF token
                },
                body: JSON.stringify({ symbols })
            });

            updateCSRFToken(response); // Update CSRF token from response
            const data = await response.json();
            if (data.error) {
                console.error('Error fetching logos:', data.error);
            } else {
                updateTable(data.results);
            }
        } catch (error) {
            console.error('Error fetching logos:', error);
        }
    });

    fetchLogoButtons.forEach(button => {
        button.addEventListener('click', async function () {
            const row = this.closest('tr');
            const symbol = row.getAttribute('data-symbol');

            if (!symbol) {
                console.error('Symbol not found in row attributes.');
                return;
            }

            try {
                const response = await fetch('<?= site_url('/Management/Marketing/fetchMissingLogos') ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': "<?= csrf_hash(); ?>" // Include CSRF token
                    },
                    body: JSON.stringify({ symbols: [symbol] })
                });

                updateCSRFToken(response); // Update CSRF token from response
                const data = await response.json();
                if (data.error) {
                    console.error(`Error fetching logo for ${symbol}:`, data.error);
                } else {
                    updateTable(data.results);
                }
            } catch (error) {
                console.error(`Error fetching logo for ${symbol}:`, error);
            }
        });
    });

    function updateTable(results) {
        if (!results || !Array.isArray(results)) {
            console.warn('No results or invalid results format.');
            return;
        }

        results.forEach(result => {
            const row = document.querySelector(`tr[data-symbol="${result.symbol}"]`);
            if (!row) return;

            if (result.status === 'added') {
                row.querySelector('td:nth-child(2)').innerHTML = `<img src="${result.image_url}" alt="Logo" style="width: 50px; height: auto;">`;
                row.querySelector('td:nth-child(3)').innerHTML = `<em class="icon ni ni-alert-circle text-warning"></em><span>Pending Approval</span>`;
                row.querySelector('td:nth-child(4)').innerHTML = '';
            } else if (result.status === 'not_found') {
                row.querySelector('td:nth-child(3)').innerHTML = `<em class="icon ni ni-cross-circle text-warning"></em><span>Not Found</span>`;
            } else if (result.status === 'error') {
                row.querySelector('td:nth-child(3)').innerHTML = `<em class="icon ni ni-alert-circle text-danger"></em><span>Error</span>`;
            }
        });
    }
});

</script>
