<?php

declare(strict_types=1);

namespace App\Services\ApiClient;

use Illuminate\Support\Facades\Http;

final readonly class NewsApiClient implements DataSourceStrategy
{
    public function __construct(
        private string $baseUrl,
        private string $apiKey
    ) {
    }

    public function fetchArticles(array $params = []): array
    {
        $response = Http::get("{$this->baseUrl}/everything", array_merge($params, [
            'apiKey' => $this->apiKey,
        ]));

        if ($response->failed()) {
            throw new \Exception($response->json('message'));
        }

        return $response->json();
    }
}
