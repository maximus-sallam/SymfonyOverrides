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
        // Directly call the method from HttpClientTrait using $this
        $proxyUrl = $this->createProxyUrlFromTrait($proxy); 

        // Remove 'ssl://' from proxy URL if present
        return str_replace('ssl://', '', $proxyUrl);  // Strip 'ssl://'
    }

    // This method is used to access the original functionality in the trait
    private function createProxyUrlFromTrait(array $proxy): string
    {
        return parent::createProxyUrl($proxy);
    }
}
