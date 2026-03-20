(function ($) {
    'use strict';

    var scorecardTable = null;
    var scoreChart = null;
    var flagChart = null;

    function initTable() {
        scorecardTable = initDataTableSafe($('#squeeze-scorecard-table'),{
            paging: true,
            searching: true,
            order: [[1, 'desc']],
            info: false
        });
    }

    function updateScorecards() {
        $.getJSON('/api/squeeze/scorecard', function (response) {
            if (!response || response.status !== 'success') {
                return;
            }

            var items = response.data.items || [];
            var tableBody = [];
            var scores = [];
            var flagsCount = {
                lowFloat: 0,
                extremeSI: 0,
                insaneTurnover: 0
            };

            items.forEach(function (item, index) {
                var flags = item.flags || {};

                if (flags.lowFloat) { flagsCount.lowFloat++; }
                if (flags.extremeSI) { flagsCount.extremeSI++; }
                if (flags.insaneTurnover) { flagsCount.insaneTurnover++; }

                var flagHtml = Object.keys(flags).filter(function (key) {
                    return flags[key];
                }).map(function (key) {
                    var label = key.replace(/([A-Z])/g, ' $1').replace(/_/g, ' ');
                    return '<span class="badge badge-warning squeeze-flag">' + label + '</span>';
                }).join(' ');

                tableBody.push([
                    '<button class="btn btn-link p-0 squeeze-symbol" data-symbol="' + item.symbol + '">' + item.symbol + '</button>',
                    item.score_total,
                    item.score_squeeze,
                    item.score_sustainability,
                    item.score_risk,
                    flagHtml,
                    item.as_of_datetime
                ]);

                scores.push({
                    symbol: item.symbol,
                    score: item.score_total
                });

                if (index === 0) {
                    loadZoomOut(item.symbol);
                    loadFadeSetups(item.symbol);
                }
            });

            $('#squeeze-last-updated').text(items.length ? items[0].as_of_datetime : 'No data');

            scorecardTable.clear();
            scorecardTable.rows.add(tableBody).draw();

            updateCharts(scores.slice(0, 10), flagsCount);
        });
    }

    function updateCharts(scores, flags) {
        var labels = scores.map(function (row) { return row.symbol; });
        var data = scores.map(function (row) { return row.score; });

        if (scoreChart) {
            scoreChart.destroy();
        }

        var scoreCtx = document.getElementById('squeezeScoreChart').getContext('2d');
        scoreChart = new Chart(scoreCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Score Total',
                    backgroundColor: '#2c7be5',
                    data: data
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });

        if (flagChart) {
            flagChart.destroy();
        }
        var flagCtx = document.getElementById('squeezeFlagChart').getContext('2d');
        flagChart = new Chart(flagCtx, {
            type: 'doughnut',
            data: {
                labels: ['Low Float', 'Extreme SI', 'Insane Turnover'],
                datasets: [{
                    data: [flags.lowFloat, flags.extremeSI, flags.insaneTurnover],
                    backgroundColor: ['#f6c343', '#e63757', '#39afd1']
                }]
            },
            options: {
                responsive: true
            }
        });
    }

    function loadZoomOut(symbol) {
        $.getJSON('/api/squeeze/zoomout', { symbol: symbol }, function (response) {
            if (!response || response.status !== 'success') {
                return;
            }

            var data = response.data || {};
            var html = '';
            html += '<div class="mb-2"><strong>Trend:</strong> <span class="badge badge-secondary">' + (data.trend_state || 'n/a') + '</span></div>';
            html += '<div class="mb-2"><strong>Dilution Risk:</strong> <span class="badge badge-secondary">' + (data.dilution_risk || 'n/a') + '</span></div>';
            html += '<div class="mb-2"><strong>Fundamentals:</strong> <span class="badge badge-secondary">' + (data.fundamentals_state || 'n/a') + '</span></div>';
            html += '<p class="text-muted">' + (data.narrative || 'No narrative available.') + '</p>';

            $('#squeeze-zoomout').html(html);
        });
    }

    function loadFadeSetups(symbol) {
        $.getJSON('/api/squeeze/fade', { symbol: symbol }, function (response) {
            if (!response || response.status !== 'success') {
                return;
            }

            var rows = response.data || [];
            if (!rows.length) {
                $('#squeeze-fade-setups').html('<p class="text-muted">No fade setups available for this symbol.</p>');
                return;
            }

            var html = rows.map(function (row) {
                return '<div class="fade-card">' +
                    '<div class="d-flex justify-content-between">' +
                    '<strong>' + row.setup_grade + ' - ' + row.entry_type + '</strong>' +
                    '<span class="text-muted">' + row.as_of_datetime + '</span>' +
                    '</div>' +
                    '<div class="small">Entry: ' + (row.entry_price || 'n/a') + ' | Stop: ' + (row.stop_price || 'n/a') + '</div>' +
                    '<div class="small">T1: ' + (row.target1 || 'n/a') + ' | T2: ' + (row.target2 || 'n/a') + '</div>' +
                    '<div class="small text-muted">' + (row.risk_notes || '') + '</div>' +
                    '</div>';
            }).join('');

            $('#squeeze-fade-setups').html(html);
        });
    }

    $(document).on('click', '.squeeze-symbol', function () {
        var symbol = $(this).data('symbol');
        loadZoomOut(symbol);
        loadFadeSetups(symbol);
    });

    $(function () {
        initTable();
        updateScorecards();
    });
})(jQuery);
