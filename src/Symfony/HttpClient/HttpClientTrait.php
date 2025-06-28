<?php
namespace Symfony\Component\HttpClient;
trait HttpClientTrait {
    private function getProxyUrl(array $proxy): string {
        // FIX: Removed 'ssl://' prefix
        return $proxy['host'] . ':' . ($proxy['port'] ?? '443');
    }
}
