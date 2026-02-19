
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-1">Subsystem Health</h5>
                <div class="small text-soft">AIOps + Chat control plane</div>
            </div>
            <span class="badge bg-secondary" id="subs-health-overall">Unknown</span>
        </div>
        <div class="row mt-2">
            <div class="col-md-6 small">AIOps n8n: <span id="subs-aiops-status">-</span> (port 5678: <span id="subs-aiops-port">-</span>, bridge 8500: <span id="subs-bridge-port">-</span>)</div>
            <div class="col-md-6 small">Chat: <span id="subs-chat-status">-</span> (port <span id="subs-chat-port-num">-</span>: <span id="subs-chat-port">-</span>)</div>
        </div>
        <div class="btn-group mt-3" role="group">
            <button class="btn btn-sm btn-outline-primary" data-subs-action="refresh">Refresh Status</button>
            <button class="btn btn-sm btn-outline-info" data-subs-action="audit">Run Audit</button>
            <button class="btn btn-sm btn-outline-warning" data-subs-action="repair">Run Repair</button>
            <button class="btn btn-sm btn-outline-secondary" data-subs-action="self-heal">Self Heal</button>
            <button class="btn btn-sm btn-outline-danger" data-subs-action="restart-aiops">Restart AIOps</button>
            <button class="btn btn-sm btn-outline-danger" data-subs-action="restart-chat">Restart Chat</button>
        </div>
        <pre class="mt-2 mb-0 p-2 bg-light border" style="max-height:180px;overflow:auto;" id="subs-health-output">Ready.</pre>