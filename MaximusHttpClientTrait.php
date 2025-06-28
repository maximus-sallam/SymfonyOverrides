<?php

namespace MaximusSallam\SymfonyOverrides;

use Symfony\Component\HttpClient\HttpClientTrait as SymfonyHttpClientTrait;

class MaximusHttpClientTrait
{
    use SymfonyHttpClientTrait;  // Use the original HttpClientTrait

    /**
     * Overriding the proxy URL behavior to strip 'ssl://' prefix.
     */
    protected function createProxyUrl(array $proxy): string
    {
        $proxyUrl = parent::createProxyUrl($proxy);  // Call the original method from HttpClientTrait

        // Remove 'ssl://' from proxy URL if present
        return str_replace('ssl://', '', $proxyUrl);  // Strip 'ssl://'
    }
}

