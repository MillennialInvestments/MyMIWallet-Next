<div class="nk-block">
    <div class="card card-bordered">
        <div class="card-aside-wrap">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head nk-block-head-lg">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Connected with Social Account</h4>
                            <div class="nk-block-des">
                                <p>Link Discord to unlock slash commands, ticker lookups, and gated alerts directly from your server.</p>
                            </div>
                        </div>
                        <div class="nk-block-head-content align-self-start d-lg-none">
                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-bs-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->

                <?php if (!empty($discordLinkMessage)): ?>
                    <div class="alert alert-<?php echo ($discordLinkMessage['status'] ?? '') === 'linked' ? 'success' : 'danger'; ?>">
                        <?php echo esc($discordLinkMessage['message'] ?? 'Discord account linked successfully.'); ?>
                    </div>
                <?php endif; ?>

                <div class="card card-bordered mb-4">
                    <div class="card-inner">
                        <div class="between-center flex-wrap flex-md-nowrap g-3">
                            <div class="media media-center gx-3 wide-xs">
                                <div class="media-object">
                                    <em class="icon icon-circle icon-circle-lg ni ni-discord"></em>
                                </div>
                                <div class="media-content">
                                    <?php $isLinked = !empty($discordLink['linked_at'] ?? null); ?>
                                    <p class="mb-1">Use the <code>/mymi link</code> slash command in Discord to generate a secure link token, then return here to confirm.</p>
                                    <?php if ($isLinked): ?>
                                        <p class="text-success mb-0">Linked as <strong><?php echo esc($discordLink['discord_username'] ?? ''); ?></strong> (ID: <?php echo esc($discordLink['discord_user_id'] ?? ''); ?>).</p>
                                    <?php else: ?>
                                        <p class="text-soft mb-0">No Discord account linked yet.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="nk-block-actions flex-shrink-0">
                                <?php if ($isLinked): ?>
                                    <span class="badge bg-success">Connected</span>
                                <?php else: ?>
                                    <a href="<?php echo esc($discordLinkUrl); ?>" class="btn btn-lg btn-primary">Return after /mymi link</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div><!-- .card-inner -->
                </div><!-- .card -->

                <div class="card card-bordered mb-4">
                    <div class="card-inner">
                        <div class="card-title-group align-start mb-3">
                            <div class="card-title">
                                <h6 class="subtitle">MyMI AI Permissions</h6>
                                <span class="text-soft">Choose what the assistant can reference and the tone to use.</span>
                            </div>
                        </div>
                        <form id="discordScopesForm" class="gy-2">
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <label class="form-label" for="aiPersona">AI Persona</label>
                                    <select class="form-select" id="aiPersona" name="ai_persona">
                                        <?php $persona = $discordPersona ?? 'investor'; ?>
                                        <option value="investor" <?= ($persona === 'investor') ? 'selected' : ''; ?>>Long-term Investor</option>
                                        <option value="trader" <?= ($persona === 'trader') ? 'selected' : ''; ?>>Active Trader</option>
                                        <option value="budgeter" <?= ($persona === 'budgeter') ? 'selected' : ''; ?>>Budget Coach</option>
                                    </select>
                                </div>
                                <div class="col-md-6 d-flex align-items-end">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="unlinkDiscord" name="unlink">
                                        <label class="form-check-label" for="unlinkDiscord">Unlink Discord</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 pt-2">
                                <?php $scopes = $discordScopes ?? []; ?>
                                <div class="col-sm-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="scopeBudget" name="scopes[budget]" <?= !empty($scopes['budget']) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="scopeBudget">Budget summaries</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="scopeAlerts" name="scopes[alerts]" <?= !empty($scopes['alerts']) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="scopeAlerts">Open alerts</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="scopeWatchlists" name="scopes[watchlists]" <?= !empty($scopes['watchlists']) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="scopeWatchlists">Watchlists</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="scopeMarketing" name="scopes[marketing]" <?= !empty($scopes['marketing']) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="scopeMarketing">Education &amp; marketing</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 d-flex gap-2">
                                <button type="button" id="saveDiscordScopes" class="btn btn-primary">Save Preferences</button>
                                <span id="discordScopeStatus" class="text-soft small"></span>
                            </div>
                        </form>
                    </div>
                </div>

                <h6 class="lead-text">Connect to Facebook</h6>
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="between-center flex-wrap flex-md-nowrap g-3">
                            <div class="media media-center gx-3 wide-xs">
                                <div class="media-object">
                                    <em class="icon icon-circle icon-circle-lg ni ni-facebook-f"></em>
                                </div>
                                <div class="media-content">
                                    <p>Connect with your Facebook account. <em class="d-block text-soft">Not connected yet</em></p>
                                </div>
                            </div>
                            <div class="nk-block-actions flex-shrink-0">
                                <a href="#" class="btn btn-lg btn-success disabled">Coming soon</a>
                            </div>
                        </div>
                    </div><!-- .nk-card-inner -->
                </div><!-- .nk-card -->
                <h6 class="lead-text">Connect to Google</h6>
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="between-center flex-wrap flex-md-nowrap g-3">
                            <div class="media media-center gx-3 wide-xs">
                                <div class="media-object">
                                    <em class="icon icon-circle icon-circle-lg ni ni-google"></em>
                                </div>
                                <div class="media-content">
                                    <p>Connect with your Google account. <em class="d-block text-soft">Not connected yet</em></p>
                                </div>
                            </div>
                            <div class="nk-block-actions flex-shrink-0">
                                <a href="#" class="btn btn-lg btn-success disabled">Coming soon</a>
                            </div>
                        </div>
                    </div><!-- .nk-card-inner -->
                </div><!-- .nk-card -->
            </div>
            <?php
            $controlCenterData = [];
            echo view('UserModule\\Views\\Dashboard\\Account\\ControlCenter', $controlCenterData);
            ?>
        </div><!-- .card-aside-wrap -->
    </div><!-- .card -->
</div><!-- .nk-block -->