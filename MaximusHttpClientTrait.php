<?php

namespace MaximusSallam\SymfonyOverrides;

use Symfony\Component\HttpClient\HttpClientTrait as SymfonyHttpClientTrait;

class MaximusHttpClientTrait extends SymfonyHttpClientTrait
{
    protected function createProxyUrl(array $proxy): string
    {
        $proxyUrl = parent::createProxyUrl($proxy);

        // Remove 'ssl://' from proxy URL if present
        return str_replace('ssl://', '', $proxyUrl);  // Strip 'ssl://'
    }
}
