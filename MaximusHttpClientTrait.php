<?php
namespace MaximusSallam\SymfonyOverrides;
use Symfony\Component\HttpClient\HttpClientTrait as SymfonyHttpClientTrait;
class MaximusHttpClientTrait extends SymfonyHttpClientTrait {
    // Override the proxy URL behavior to remove 'ssl://'
    protected function createProxyUrl(array $proxy): string {
        $proxyUrl = parent::createProxyUrl($proxy);
        return str_replace('ssl://', '', $proxyUrl); // Remove 'ssl://' from proxy URL
    }
}

