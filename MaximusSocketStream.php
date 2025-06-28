<?php
namespace MaximusSallam\SymfonyOverrides;
use Symfony\Component\Mailer\Transport\Smtp\Stream\SocketStream as SymfonySocketStream;
class MaximusSocketStream extends SymfonySocketStream {
    public function __construct(string $url, float $timeout = null, float $idleTimeout = null) {
        // Prevent 'ssl://' from being prepended
        $url = str_replace('ssl://', '', $url);
        parent::__construct($url, $timeout, $idleTimeout);
    }
}

