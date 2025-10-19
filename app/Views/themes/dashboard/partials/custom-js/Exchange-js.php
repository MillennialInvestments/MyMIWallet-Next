<?php // app/Views/themes/dashboard/partials/custom-js/Exchange-js.php ?>
<?php $nonce = $nonce ?? ['style' => '', 'script' => '']; ?>
<!-- ExchangeJS WebSocket Example -->
<script <?= $nonce['script'] ?? '' ?>>
    document.addEventListener('DOMContentLoaded', function() {
        const socket = new WebSocket('wss://mymiwallet.com:8081');

        socket.addEventListener('open', function(event) {
            console.log('WebSocket connection established.');
            const message = JSON.stringify({ method: 'updateMarketPrices', params: [] });
            socket.send(message);
        });

        socket.addEventListener('message', function(event) {
            console.log('Message from server', event.data);
            const marketData = JSON.parse(event.data);
            // Update your UI with the received market data
        });

        socket.addEventListener('close', function(event) {
            console.log('WebSocket connection closed.');
        });

        socket.addEventListener('error', function(event) {
            console.error('WebSocket error:', event);
        });
    });
</script>
<script <?= $nonce['script'] ?? '' ?>>
    let socket;

    function connectWebSocket() {
        if (socket && socket.readyState === WebSocket.OPEN) {
            console.log('WebSocket is already open.');
            return;
        }

        socket = new WebSocket('wss://ws.mymiwallet.com/ws/');

        socket.addEventListener('open', function(event) {
            console.log('WebSocket connection established.');
            const message = JSON.stringify({ method: 'updateMarketPrices', params: [] });
            socket.send(message);
        });

        socket.addEventListener('message', function(event) {
            console.log('Message from server', event.data);
            const marketData = JSON.parse(event.data);
            // Update your UI with the received market data
        });

        socket.addEventListener('close', function(event) {
            console.log('WebSocket connection closed.');
        });

        socket.addEventListener('error', function(event) {
            console.error('WebSocket error:', event);
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        connectWebSocket();
    });

    window.addEventListener('beforeunload', function() {
        if (socket) {
            socket.close();
            console.log('WebSocket connection closed by client.');
        }
    });
</script>
