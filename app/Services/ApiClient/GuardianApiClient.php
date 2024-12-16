<?php

declare(strict_types=1);

namespace App\Services\ApiClient;

use Illuminate\Support\Facades\Http;

final readonly class GuardianApiClient implements DataSourceStrategy
{
    public function __construct(
        private string $baseUrl,
        private string $apiKey
    ) {
    }

    public function fetchArticles(array $params = []): array
    {
        $response = Http::get("{$this->baseUrl}/search", array_merge($params, [
            'api-key' => $this->apiKey,
        ]));

        if ($response->failed()) {
            throw new \Exception('Failed to fetch articles from The Guardian.');
        }

        return $response->json();
    }
}
