<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-9">
            <!-- Header & Disclaimer Banner -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-dark text-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0 fw-bold">MyMI Coin (Reg D 506(c) Private Offering)</h4>
                        <span class="badge bg-<?= !empty($isAccredited) ? 'success' : 'warning text-dark' ?> fs-6">
                            <?= !empty($isAccredited) ? 'Accredited Verified' : 'Accreditation Required' ?>
                        </span>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="alert alert-danger mb-4" role="alert">
                        <h6 class="alert-heading fw-bold mb-2"><i class="bi bi-exclamation-triangle-fill me-2"></i>Regulatory & Risk Disclosures (SEC Regulation D 506(c))</h6>
                        <p class="small mb-1">
                            This offering is not registered with the Securities and Exchange Commission (SEC) and is conducted pursuant to the exemption provided by Rule 506(c) of Regulation D. Tokens issued represent private placement securities and are <strong>restricted securities</strong> under Rule 144.
                        </p>
                        <p class="small mb-0">
                            <strong>No Public Sale:</strong> MyMI Coin is not available for public sale and is not listed on any exchange. <strong>No Guaranteed Return:</strong> All investments involve significant risk of total loss. No returns, yields, or profits are guaranteed.
                        </p>
                    </div>

                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <div class="p-3 border rounded bg-light h-100">
                                <h6 class="fw-bold mb-3 text-primary">Offering Overview</h6>
                                <ul class="list-unstyled mb-0 small">
                                    <li class="mb-2"><strong>Issuer:</strong> Millennial Digital Investments Trust (MDIT)</li>
                                    <li class="mb-2"><strong>Token Symbol:</strong> MYMIC</li>
                                    <li class="mb-2"><strong>Eligibility:</strong> Verified Accredited Investors Only</li>
                                    <li class="mb-2"><strong>Minimum Subscription:</strong> $5,000.00 USDC</li>
                                    <li class="mb-0"><strong>Settlement:</strong> On-chain USDC deposit & MDIT Ledger Mint</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 border rounded bg-light h-100">
                                <h6 class="fw-bold mb-3 text-primary">Technical Anchoring</h6>
                                <ul class="list-unstyled mb-0 small">
                                    <li class="mb-2"><strong>Ledger Authority:</strong> Append-Only MDIT Token Ledger</li>
                                    <li class="mb-2"><strong>Testnet Anchor:</strong> Solana Devnet SPL Token (Test Only)</li>
                                    <li class="mb-2"><strong>Mainnet Status:</strong> Closed Private Placement (Zero Public Mint)</li>
                                    <li class="mb-0"><strong>Transfer Restrictions:</strong> Transferable only between verified accredited participants.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Interest Registration Form -->
                    <div class="card border">
                        <div class="card-header bg-light py-3">
                            <h5 class="card-title mb-0 fw-bold">Accredited Investor Expression of Interest</h5>
                        </div>
                        <div class="card-body p-4">
                            <form id="mymicoin-interest-form" action="/Offerings/MyMI-Coin/Interest" method="post">
                                <?= csrf_field() ?>

                                <div class="mb-3">
                                    <label for="interest-email" class="form-label fw-bold">Investor Email</label>
                                    <input type="email" id="interest-email" name="email" class="form-control" value="<?= esc($user->email ?? '') ?>" required>
                                    <div class="form-text">Our compliance team will send official offering documents and accreditation verification instructions.</div>
                                </div>

                                <div class="mb-3">
                                    <label for="interest-amount" class="form-label fw-bold">Intended Investment Amount (USD)</label>
                                    <input type="number" step="1000" min="5000" id="interest-amount" name="intended_investment_usd" class="form-control" placeholder="10000" value="10000" required>
                                    <div class="form-text">Minimum investment: $5,000.00 USD.</div>
                                </div>

                                <div class="mb-3">
                                    <label for="interest-notes" class="form-label fw-bold">Notes / Verification Method</label>
                                    <textarea id="interest-notes" name="notes" class="form-control" rows="2" placeholder="e.g. CPA letter, third-party accreditation verification service, net worth attestation"></textarea>
                                </div>

                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" id="interest-attestation" name="accreditation_attestation" value="1" required>
                                    <label class="form-check-label small" for="interest-attestation">
                                        <strong>Accredited Investor Attestation:</strong> I attest that I am an Accredited Investor as defined under Rule 501 of Regulation D (individual income exceeding $200,000 in each of the prior two years, or joint income exceeding $300,000, or individual net worth exceeding $1,000,000 excluding primary residence).
                                    </label>
                                </div>

                                <button type="submit" id="interest-submit-btn" class="btn btn-primary px-4 py-2 fw-bold">
                                    Submit Accredited Interest
                                </button>
                            </form>

                            <div id="interest-alert" class="alert d-none mt-3" role="alert"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script<?= script_nonce_attr() ?>>
document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('mymicoin-interest-form');
    if (!form) return;

    form.addEventListener('submit', async function (ev) {
        ev.preventDefault();
        var alertBox = document.getElementById('interest-alert');
        var submitBtn = document.getElementById('interest-submit-btn');
        alertBox.className = 'alert d-none mt-3';
        submitBtn.disabled = true;

        try {
            var formData = new FormData(form);
            var res = await fetch('/Offerings/MyMI-Coin/Interest', {
                method: 'POST',
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                body: formData
            });

            var data = await res.json();
            if (data.ok) {
                alertBox.className = 'alert alert-success mt-3';
                alertBox.textContent = data.message || 'Expression of interest submitted successfully.';
            } else {
                alertBox.className = 'alert alert-danger mt-3';
                alertBox.textContent = data.message || data.error || 'Failed to submit expression of interest.';
            }
        } catch (err) {
            alertBox.className = 'alert alert-danger mt-3';
            alertBox.textContent = 'Network error while submitting interest.';
        } finally {
            submitBtn.disabled = false;
        }
    });
});
</script>
