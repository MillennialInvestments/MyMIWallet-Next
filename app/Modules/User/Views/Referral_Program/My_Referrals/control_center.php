<?php
$referralLink   = $referral_link ?? null;
$referralCode   = $cuReferrerCode ?? '';
$encodedLink    = $referralLink ? rawurlencode($referralLink) : '';
$shareMessage   = $referralLink ? rawurlencode('Join me on MyMI Wallet using referral code ' . $referralCode) : '';
$emailSubject   = $referralLink ? rawurlencode('Join MyMI Wallet with my referral code') : '';
$emailBody      = $referralLink ? rawurlencode("Hey! I'm using MyMI Wallet to manage my finances. Use my code {$referralCode} when you sign up: {$referralLink}") : '';
$linkDisabled   = empty($referralLink);
?>
<div class="card card-bordered h-100">
    <div class="card-inner-group">
        <div class="card-inner card-inner-md">
            <div class="card-title-group align-items-center">
                <div class="card-title">
                    <h6 class="title mb-1">Referral Control Center</h6>
                    <p class="text-soft mb-0">Track, share, and grow your referral network.</p>
                </div>
                <div class="card-tools me-n1">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown">
                            <em class="icon ni ni-more-h"></em>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <ul class="link-list-opt no-bdr">
                                <li><a href="#" role="button"><em class="icon ni ni-setting"></em><span>Settings</span></a></li>
                                <li><a href="<?= esc(site_url('Support/Contact'), 'attr') ?>"><em class="icon ni ni-help"></em><span>Need Help?</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-inner border-bottom">
            <div class="d-flex flex-column gap-3">
                <div>
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                        <div>
                            <h6 class="title mb-1">Your Referral Link</h6>
                            <p class="mb-0 text-soft">Share this unique link or code with friends.</p>
                        </div>
                        <span class="badge bg-outline-primary text-uppercase">Code: <span class="fw-semibold"><?= esc($referralCode ?: 'Unavailable'); ?></span></span>
                    </div>
                    <div class="bg-lighter rounded-3 p-3 mt-3">
                        <?php if ($linkDisabled): ?>
                            <p class="mb-0 text-soft">Referral link not available yet. Complete your affiliate profile to unlock sharing.</p>
                        <?php else: ?>
                            <div class="fw-semibold text-break" id="referralLinkDisplay"><?= esc($referralLink); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-outline-primary btn-sm copy-referral-link" data-referral-link="<?= esc($referralLink ?? '', 'attr'); ?>" <?= $linkDisabled ? 'disabled' : ''; ?>>
                        <em class="icon ni ni-copy me-1"></em>Copy Link
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" <?= $linkDisabled ? 'disabled' : ''; ?>>
                            <em class="icon ni ni-share me-1"></em>Share
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="<?= $linkDisabled ? '#' : 'https://www.facebook.com/sharer/sharer.php?u=' . $encodedLink; ?>" target="_blank" rel="noopener" <?= $linkDisabled ? 'aria-disabled="true"' : ''; ?>>Facebook</a>
                            <a class="dropdown-item" href="<?= $linkDisabled ? '#' : 'https://twitter.com/intent/tweet?url=' . $encodedLink . '&text=' . $shareMessage; ?>" target="_blank" rel="noopener" <?= $linkDisabled ? 'aria-disabled="true"' : ''; ?>>X / Twitter</a>
                            <a class="dropdown-item" href="<?= $linkDisabled ? '#' : 'https://www.linkedin.com/sharing/share-offsite/?url=' . $encodedLink; ?>" target="_blank" rel="noopener" <?= $linkDisabled ? 'aria-disabled="true"' : ''; ?>>LinkedIn</a>
                            <a class="dropdown-item" href="<?= $linkDisabled ? '#' : 'mailto:?subject=' . $emailSubject . '&body=' . $emailBody; ?>" <?= $linkDisabled ? 'aria-disabled="true"' : ''; ?>>Email</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-user-add"></em>
                    <div class="title">Create New Referral</div>
                    <p class="mb-0">Start creating new referrals by clicking the button below.</p>
                </div>
                <a href="<?= esc(site_url('Referrals/Create'), 'attr'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-plus"></em></a>
            </div>
        </div>
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-users"></em>
                    <div class="title">Active Referrals</div>
                    <p class="mb-0">Review <a href="<?= esc(site_url('Referral/Active'), 'attr'); ?>">Active Referrals</a> for engagement insights.</p>
                </div>
                <a href="<?= esc(site_url('Referral/Active'), 'attr'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
            </div>
        </div>
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-user-check"></em>
                    <div class="title">Pending Referrals</div>
                    <p class="mb-0">Follow up with <a href="<?= esc(site_url('Referral/Pending'), 'attr'); ?>">Pending Referrals</a>.</p>
                </div>
                <a href="<?= esc(site_url('Referral/Pending'), 'attr'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
            </div>
        </div>
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-file-text"></em>
                    <div class="title">Referral Reports</div>
                    <p class="mb-0">View detailed referral reports for performance analysis.</p>
                </div>
                <a href="<?= esc(site_url('Referral/Reports'), 'attr'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
            </div>
        </div>
    </div>
</div>