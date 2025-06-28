<?php

namespace MaximusSallam\SymfonyOverrides;

use Symfony\Component\Mailer\Transport\Smtp\Stream\SocketStream as SymfonySocketStream;

class MaximusSocketStream
{
    private SymfonySocketStream $socketStream;

    /**
     * Constructor where we strip 'ssl://' from the URL before passing it to the SocketStream.
     */
    public function __construct(string $url, float $timeout = null, float $idleTimeout = null)
    {
        // Strip 'ssl://' from the URL if it exists
        $url = str_replace('ssl://', '', $url);

        // Create an instance of the original SocketStream (composition)
        $this->socketStream = new SymfonySocketStream($url, $timeout, $idleTimeout);
    }

    /**
     * Delegate connect() to the original SocketStream.
     */
    public function connect()
    {
        return $this->socketStream->connect();
    }

    /**
     * Delegate getSocket() to the original SocketStream.
     */
    public function getSocket()
    {
        return $this->socketStream->getSocket();
    }
}
