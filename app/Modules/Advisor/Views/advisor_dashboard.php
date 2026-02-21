<?php if (! aiKimiEnabled()) : ?>
    <div class="alert alert-warning">Kimi AI is disabled. Enable it in Site Settings to access Advisor tools.</div>
    <?php return; ?>
<?php endif; ?>

<div class="nk-block">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">MyMI AI Advisor</h3>
            <div class="nk-block-des">
                <p>Generate portfolio insights, Coffee &amp; Stocks storyboards, and trade analyses with Kimi-K2.</p>
            </div>
        </div>
    </div>

    <div class="row g-gs">
        <div class="col-sm-4">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-2">
                        <div class="card-title">
                            <h6 class="title">Personalized Insight</h6>
                            <p class="sub-text">Budget + portfolio + alerts</p>
                        </div>
                    </div>
                    <p>Combine budgeting, investment health, and risk signals into a single AI-generated insight.</p>
                    <button id="generateAdvisorInsight" class="btn btn-primary w-100 mb-1">Generate MyMI Advisor Insight</button>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-2">
                        <div class="card-title">
                            <h6 class="title">Coffee &amp; Stocks</h6>
                            <p class="sub-text">Daily storyboard</p>
                        </div>
                    </div>
                    <p>Create a timestamped storyboard from the latest scraped news with CTAs for your audience.</p>
                    <button id="generateStoryboard" class="btn btn-outline-primary w-100 mb-1">Today’s Coffee &amp; Stocks Storyboard</button>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-2">
                        <div class="card-title">
                            <h6 class="title">Trade Analysis</h6>
                            <p class="sub-text">Alerts refinement</p>
                        </div>
                    </div>
                    <p>Review active alerts for thesis, entries/exits, stop-loss logic, and macro alignment.</p>
                    <button id="analyzeAlerts" class="btn btn-secondary w-100" data-target="advisor-insight-modal">Analyze My Active Alerts</button>
                </div>
            </div>
        </div>
    </div>

    <div class="nk-block mt-4">
        <div class="card card-bordered">
            <div class="card-inner">
                <h6 class="title">Insight Panels</h6>
                <div class="accordion" id="advisor-panels">
                    <div class="accordion-item">
                        <h6 class="accordion-head" data-bs-toggle="collapse" data-bs-target="#panel-health">Financial health</h6>
                        <div id="panel-health" class="accordion-body collapse show" data-bs-parent="#advisor-panels">
                            <div class="accordion-inner" id="advisor-health"></div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h6 class="accordion-head" data-bs-toggle="collapse" data-bs-target="#panel-portfolio">Portfolio insights</h6>
                        <div id="panel-portfolio" class="accordion-body collapse" data-bs-parent="#advisor-panels">
                            <div class="accordion-inner" id="advisor-portfolio"></div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h6 class="accordion-head" data-bs-toggle="collapse" data-bs-target="#panel-budget">Budget recommendations</h6>
                        <div id="panel-budget" class="accordion-body collapse" data-bs-parent="#advisor-panels">
                            <div class="accordion-inner" id="advisor-budget"></div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h6 class="accordion-head" data-bs-toggle="collapse" data-bs-target="#panel-alerts">Trade alert improvements</h6>
                        <div id="panel-alerts" class="accordion-body collapse" data-bs-parent="#advisor-panels">
                            <div class="accordion-inner" id="advisor-alerts"></div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h6 class="accordion-head" data-bs-toggle="collapse" data-bs-target="#panel-macro">Macro environment overview</h6>
                        <div id="panel-macro" class="accordion-body collapse" data-bs-parent="#advisor-panels">
                            <div class="accordion-inner" id="advisor-macro"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('App\\Modules\\Advisor\\Views\\partials\\advisor_insight_modal'); ?>

<script>
    (function() {
        const userId = <?= json_encode($cuID ?? null); ?>;

        const loadInsightModal = () => {
            if (typeof dynamicModalLoader === 'function') {
                dynamicModalLoader('/Advisor/generateInsight', { user_id: userId });
            }
        };

        document.getElementById('generateAdvisorInsight')?.addEventListener('click', loadInsightModal);
        document.getElementById('analyzeAlerts')?.addEventListener('click', loadInsightModal);

        document.getElementById('generateStoryboard')?.addEventListener('click', async () => {
            try {
                const response = await fetch('Advisor/generateStoryboard', { method: 'POST' });
                const json = await response.json();
                if (json?.content) {
                    document.getElementById('advisor-macro').innerHTML = json.content;
                } else if (json?.data?.choices?.[0]?.message?.content) {
                    document.getElementById('advisor-macro').innerHTML = json.data.choices[0].message.content;
                } else if (json?.status === 'disabled') {
                    document.getElementById('advisor-macro').innerHTML = json.message || 'Kimi AI is disabled.';
                }
            } catch (e) {
                console.error('Storyboard generation failed', e);
            }
        });
    })();
</script>