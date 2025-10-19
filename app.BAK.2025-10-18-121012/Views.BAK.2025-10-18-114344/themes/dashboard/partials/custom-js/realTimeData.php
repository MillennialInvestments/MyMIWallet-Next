<?php // app/Views/themes/dashboard/partials/custom-js/realTimeData.php ?>
<?php $nonce = $nonce ?? ['style' => '', 'script' => '']; ?>
<!-- Real-Time Data with WebSocket Example -->
<script <?= $nonce['script'] ?? '' ?>>
let socket;

function initializeWebSocket() {
    // Ensure socket is only initialized once
    if (!socket || socket.readyState === WebSocket.CLOSED) {
        socket = new WebSocket('wss://mymiwallet.com:8081'); // Secure WebSocket connection

        // Attach event listeners
        socket.onopen = () => {
            console.log("WebSocket connection established");
            fetchData();
        };

        socket.onmessage = (event) => {
            const data = JSON.parse(event.data);
            updateView(data);
        };

        socket.onerror = (error) => {
            console.error("WebSocket error:", error);
            reconnectWebSocket();
        };

        socket.onclose = (event) => {
            console.warn("WebSocket connection closed:", event);
            reconnectWebSocket();
        };
    } else {
        console.log("WebSocket is already open or connecting");
    }
}

// Reconnect WebSocket with exponential backoff
let reconnectAttempts = 0;

function reconnectWebSocket() {
    console.log("Reconnecting WebSocket...");
    const delay = Math.min(5000 * (2 ** reconnectAttempts), 60000); // Cap at 60 seconds
    setTimeout(() => {
        reconnectAttempts++;
        initializeWebSocket();
    }, delay);
}

// Fetch data periodically
function fetchData() {
    if (socket && socket.readyState === WebSocket.OPEN) {
        const uriSegments = window.location.pathname.split('/').filter(Boolean);
        const message = JSON.stringify({ type: 'fetch', uriSegments });
        socket.send(message);
    } else {
        console.error("WebSocket is not open. Retrying...");
    }

    // Schedule periodic updates
    setTimeout(fetchData, 30000); // Every 30 seconds
}

// Update the view dynamically
function updateView(data) {
    if (data.marketData) {
        document.getElementById('market-price').textContent = `$${data.marketData.price}`;
        document.getElementById('market-cap').textContent = `${data.marketData.marketCap}`;
    }

    if (data.userAssets) {
        const container = document.getElementById('user-assets');
        container.innerHTML = '';
        data.userAssets.forEach((asset) => {
            const div = document.createElement('div');
            div.textContent = `${asset.token}: ${asset.balance} (${asset.value})`;
            container.appendChild(div);
        });
    }
}

// Initialize WebSocket connection
initializeWebSocket();

</script>
