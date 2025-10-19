<div class="card card-bordered">
    <div class="card-inner">
        <h5 class="title">Platform Libraries (Tags, Keywords &amp; Rules)</h5>
        <ul class="nav nav-tabs" id="platformLibTabs" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#tab-platforms" role="tab">Platforms</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab-rules" role="tab">Rules</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab-hashtags" role="tab">Hashtags</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab-keywords" role="tab">Keywords</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab-suggestions" role="tab">Suggestions</a></li>
        </ul>
        <div class="tab-content pt-3">
            <div class="tab-pane fade show active" id="tab-platforms" role="tabpanel">
                <button class="btn btn-sm btn-primary mb-2" onclick="dynamicModalLoader('Marketing','EditPlatform')">Add Platform</button>
                <table class="datatable" id="tblPlatforms"></table>
            </div>
            <div class="tab-pane fade" id="tab-rules" role="tabpanel">
                <button class="btn btn-sm btn-primary mb-2" onclick="dynamicModalLoader('Marketing','EditRule')">Add Rule</button>
                <table class="datatable" id="tblRules"></table>
            </div>
            <div class="tab-pane fade" id="tab-hashtags" role="tabpanel">
                <button class="btn btn-sm btn-primary mb-2" onclick="dynamicModalLoader('Marketing','EditHashtag')">Add Hashtag</button>
                <table class="datatable" id="tblHashtags"></table>
            </div>
            <div class="tab-pane fade" id="tab-keywords" role="tabpanel">
                <button class="btn btn-sm btn-primary mb-2" onclick="dynamicModalLoader('Marketing','EditKeyword')">Add Keyword</button>
                <table class="datatable" id="tblKeywords"></table>
            </div>
            <div class="tab-pane fade" id="tab-suggestions" role="tabpanel">
                <button class="btn btn-sm btn-primary mb-2" onclick="dynamicModalLoader('Marketing','EditSuggestion')">Add Suggestion</button>
                <table class="datatable" id="tblSuggestions"></table>
            </div>
        </div>
        <div class="mt-3 d-flex gap-2">
            <button id="btnTestPlan" class="btn btn-outline-secondary btn-sm">Test Plan</button>
            <button id="btnComposePost" class="btn btn-outline-primary btn-sm">Compose Sample Post</button>
        </div>
        <pre class="mt-3" id="planPreview" style="min-height:120px;"></pre>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
// ⚙️ Minimal client-side hooks
$('#btnTestPlan').on('click', function(){
    fetch('/API/Management/getPostingPlan', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ platformKey: 'twitter', contentType: 'marketing', tickers: ['TSLA'], keywords: ['breakout'] })
    }).then(r=>r.json()).then(d=>{
        $('#planPreview').text(JSON.stringify(d, null, 2));
    });
});

$('#btnComposePost').on('click', function(){
    fetch('/API/Management/composePost', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ platformKey: 'twitter', contentType: 'marketing', baseCopy: 'Sample copy', tickers: ['TSLA'], keywords: ['breakout'] })
    }).then(r=>r.json()).then(d=>{
        $('#planPreview').text(d.text + "\n\n" + JSON.stringify(d.meta, null, 2));
    });
});
</script>