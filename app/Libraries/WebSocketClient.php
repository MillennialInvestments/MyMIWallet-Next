<?php namespace App\Libraries;

use App\Libraries\{BaseLoader};

#[\AllowDynamicProperties]
class WebSocketClient {

    private $host;
    private $port;
    private $socket;

    public function __construct($host, $port) {
        $this->host = $host;
        $this->port = $port;
        $this->socket = null;
    }

    public function connect() {
        $this->socket = @fsockopen($this->host, $this->port, $errno, $errstr, 2);
        if (!$this->socket) {
            throw new \Exception("Could not connect to WebSocket server: $errstr ($errno)");
        }
    }

    public function sendMessage($message) {
        if ($this->socket) {
            fwrite($this->socket, $message);
            $response = fread($this->socket, 8192);
            return $response;
        } else {
            throw new \Exception("No active WebSocket connection");
        }
    }

    public function close() {
        if (is_resource($this->socket)) {
            fclose($this->socket);
        }
    }
}
?>
