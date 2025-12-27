<?php

use App\Config\Overledger;
use App\Libraries\Overledger\MyMIOverledger;
use CodeIgniter\Cache\CacheInterface;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class ArrayCache implements CacheInterface
{
    private array $store = [];

    public function get($key)
    {
        return $this->store[$key] ?? null;
    }

    public function save($key, $value, $ttl = 60, bool $raw = false)
    {
        $this->store[$key] = $value;
        return true;
    }

    public function delete($key)
    {
        unset($this->store[$key]);
        return true;
    }

    public function increment($key, $offset = 1)
    {
        $this->store[$key] = ($this->store[$key] ?? 0) + $offset;
        return $this->store[$key];
    }

    public function decrement($key, $offset = 1)
    {
        $this->store[$key] = ($this->store[$key] ?? 0) - $offset;
        return $this->store[$key];
    }

    public function clean()
    {
        $this->store = [];
        return true;
    }

    public function getCacheInfo()
    {
        return $this->store;
    }

    public function getMetaData($key)
    {
        return null;
    }

    public function isSupported(): bool
    {
        return true;
    }
}

class FakeResponse implements ResponseInterface
{
    private int $status;
    private array $headers;
    private string $body;

    public function __construct(int $status, array $payload = [])
    {
        $this->status  = $status;
        $this->body    = json_encode($payload);
        $this->headers = ['content-type' => ['application/json']];
    }

    public function getStatusCode()
    {
        return $this->status;
    }

    public function withStatus($code, $reasonPhrase = '')
    {
        $clone = clone $this;
        $clone->status = $code;
        return $clone;
    }

    public function getBody()
    {
        return new class($this->body) implements StreamInterface {
            private string $body;
            public function __construct(string $body) { $this->body = $body; }
            public function __toString() { return $this->body; }
            public function close() {}
            public function detach() {}
            public function getSize() { return strlen($this->body); }
            public function tell() { return 0; }
            public function eof() { return true; }
            public function isSeekable() { return false; }
            public function seek($offset, $whence = SEEK_SET) {}
            public function rewind() {}
            public function isWritable() { return false; }
            public function write($string) {}
            public function isReadable() { return true; }
            public function read($length) { return substr($this->body, 0, $length); }
            public function getContents() { return $this->body; }
            public function getMetadata($key = null) { return null; }
        };
    }

    public function withBody(StreamInterface $body) { return $this; }
    public function getProtocolVersion() { return '1.1'; }
    public function withProtocolVersion($version) { return $this; }
    public function getHeaders() { return $this->headers; }
    public function hasHeader($name) { return isset($this->headers[$name]); }
    public function getHeader($name) { return $this->headers[$name] ?? []; }
    public function getHeaderLine($name) { return implode(',', $this->getHeader($name)); }
    public function withHeader($name, $value) { return $this; }
    public function withAddedHeader($name, $value) { return $this; }
    public function withoutHeader($name) { return $this; }
    public function getReasonPhrase() { return ''; }
}

class SequenceHttpClient implements ClientInterface
{
    private array $responses;
    public array $requests = [];

    public function __construct(array $responses)
    {
        $this->responses = $responses;
    }

    public function send(RequestInterface $request, array $options = [])
    {
        return $this->request($request->getMethod(), (string) $request->getUri(), $options);
    }

    public function sendAsync(RequestInterface $request, array $options = [])
    {
        throw new \BadMethodCallException('not implemented');
    }

    public function request($method, $uri, array $options = [])
    {
        $this->requests[] = [$method, $uri, $options];
        if (count($this->responses) === 0) {
            throw new \RuntimeException('No responses queued');
        }
        $response = array_shift($this->responses);
        if ($response instanceof \Throwable) {
            throw $response;
        }
        return $response;
    }

    public function requestAsync($method, $uri, array $options = [])
    {
        throw new \BadMethodCallException('not implemented');
    }

    public function getConfig($option = null)
    {
        return null;
    }
}

class MyMIOverledgerTest extends \CodeIgniter\Test\CIUnitTestCase
{
    public function testTokenRefreshUsesCacheAndLeeway()
    {
        $config = new Overledger();
        $config->clientId = 'client-123';
        $config->clientSecret = 'secret-123';
        $config->tokenLeewaySeconds = 5;
        $config->baseUrl = 'https://api.example.test';
        $config->oauthUrl = 'https://api.example.test/oauth/token';

        $cache = new ArrayCache();
        $http  = new SequenceHttpClient([
            new FakeResponse(200, ['access_token' => 'token-A', 'expires_in' => 2]),
            new FakeResponse(200, ['ok' => true]),
            new FakeResponse(200, ['access_token' => 'token-B', 'expires_in' => 3600]),
            new FakeResponse(200, ['ok' => true]),
        ]);

        $client = new class($config, $cache, $http) extends MyMIOverledger {
            public function exposeIsExpiringSoon(int $expiresAt): bool
            {
                return $this->isExpiringSoon($expiresAt);
            }
            public function exposeTokenKey(): string
            {
                return $this->tokenCacheKey;
            }
        };

        // First call refreshes token and performs request.
        $first = $client->request('GET', '/health');
        $this->assertSame('token-A', $cache->get($client->exposeTokenKey())['token']);
        $this->assertTrue($client->exposeIsExpiringSoon(time() + 2));

        // Force refresh path via expiring soon flag.
        $client->getAccessToken(true);
        $this->assertSame('token-B', $cache->get($client->exposeTokenKey())['token']);

        $second = $client->request('GET', '/health');
        $this->assertTrue($second['success']);
        $this->assertCount(4, $http->requests);
    }

    public function testRetriesAndErrorMapping()
    {
        $config = new Overledger();
        $config->clientId = 'client-abc';
        $config->clientSecret = 'secret-abc';
        $config->baseUrl = 'https://api.example.test';
        $config->oauthUrl = 'https://api.example.test/oauth/token';

        $cache = new ArrayCache();
        $http  = new SequenceHttpClient([
            new FakeResponse(200, ['access_token' => 'token-A', 'expires_in' => 3600]),
            new FakeResponse(503, ['error' => 'rate limited']),
            new FakeResponse(503, ['error' => 'still failing']),
            new FakeResponse(503, ['error' => 'final fail']),
        ]);

        $client = new MyMIOverledger($config, $cache, $http);
        $result = $client->request('GET', '/health');

        $this->assertFalse($result['success']);
        $this->assertSame(503, $result['status']);
        $this->assertStringContainsString('final fail', $result['error']);
        $this->assertGreaterThanOrEqual(3, count($http->requests));
    }
}
