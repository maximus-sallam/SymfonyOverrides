<?php
namespace Symfony\Component\Mailer\Transport\Smtp\Stream;
use Symfony\Component\Mailer\Exception\TransportException;
class SocketStream {
    private $url;
    private $stream;
    private $context;
    public function __construct(string $url, float $timeout = null, float $idleTimeout = null) {
        // FIX: Removed 'ssl://' prefix
        $this->url = $url;
        $this->context = stream_context_create();
        if (!\is_resource($this->stream = @stream_socket_client(
            $this->url,
            $errno,
            $errstr,
            $timeout ?? (float) ini_get('default_socket_timeout'),
            STREAM_CLIENT_CONNECT,
            $this->context
        ))) {
            throw new TransportException(sprintf('Failed to connect to "%s": %s.', $this->url, $errstr));
        }
        stream_set_timeout($this->stream, (int) ($timeout ?? ini_get('default_socket_timeout')));
        stream_set_blocking($this->stream, false);
        stream_set_read_buffer($this->stream, 0);
    }
}
