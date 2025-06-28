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
        // Directly call the original method from the HttpClientTrait using $this
        $proxyUrl = $this->createProxyUrlOriginal($proxy); 

        // Remove 'ssl://' from proxy URL if present
        return str_replace('ssl://', '', $proxyUrl);  // Strip 'ssl://'
    }

    // A method to directly call the trait's createProxyUrl method
    private function createProxyUrlOriginal(array $proxy): string
    {
        return $this->createProxyUrl($proxy);  // Calling the original method from the trait
    }
}
