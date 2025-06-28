<?php

namespace MaximusSallam\SymfonyOverrides;

use Symfony\Component\HttpClient\HttpClientTrait as SymfonyHttpClientTrait;

class MaximusHttpClientTrait
{
    use SymfonyHttpClientTrait;

    /**
     * Overriding the getProxy() method to strip 'ssl://' from the proxy URL.
     */
    private static function getProxy(?string $proxy, array $url, ?string $noProxy): ?array
    {
        // Call the original method from HttpClientTrait
        $proxyData = parent::getProxy($proxy, $url, $noProxy);

        // Check if the proxy URL exists and remove 'ssl://'
        if ($proxyData && isset($proxyData['url'])) {
            $proxyData['url'] = str_replace('ssl://', '', $proxyData['url']);
        }

        return $proxyData;
    }
}

