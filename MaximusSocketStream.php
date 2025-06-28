<?php
namespace MaximusSallam\SymfonyOverrides;

use Symfony\Component\Mailer\Transport\Smtp\Stream\SocketStream as SymfonySocketStream;

class MaximusSocketStream extends SymfonySocketStream
{
    public function __construct(string $url, float $timeout = null, float $idleTimeout = null)
    {
        // Remove 'ssl://' from the URL if it exists
        $url = str_replace('ssl://', '', $url);
        
        // Call the parent constructor with the modified URL
        parent::__construct($url, $timeout, $idleTimeout);
    }
}
