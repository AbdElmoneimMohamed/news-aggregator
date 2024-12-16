<?php

declare(strict_types=1);

namespace App\Services\ApiClient;

use Illuminate\Support\Facades\Http;

final readonly class BbcApiClient implements DataSourceStrategy
{
    public function __construct(
        private string $baseUrl
    ) {
    }

    public function fetchArticles(array $params = []): array
    {
        $response = Http::get("{$this->baseUrl}/news", $params);

        if ($response->failed()) {
            throw new \Exception('Failed to fetch articles from BBC News.');
        }

        return $response->json();
    }
}
