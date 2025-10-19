<?php namespace App\Libraries;

use App\Libraries\{BaseLoader};
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

#[\AllowDynamicProperties]
class WebSocketHandler implements MessageComponentInterface {

    public function onOpen(ConnectionInterface $conn) {
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        echo "New message from {$from->resourceId}: $msg\n";
        $from->send("Message received: $msg");
    }

    public function onClose(ConnectionInterface $conn) {
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}
?>
