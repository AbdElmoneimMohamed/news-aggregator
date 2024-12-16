<?php

declare(strict_types=1);

namespace App\Services\ApiClient;

interface DataSourceStrategy
{
    /**
     * @param array<string, string> $params
     * @return array<string, string>
     */
    public function fetchArticles(array $params = []): array;
}
