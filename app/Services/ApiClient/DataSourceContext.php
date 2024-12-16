<?php

declare(strict_types=1);

namespace App\Services\ApiClient;

final class DataSourceContext
{
    private DataSourceStrategy $strategy;

    public function setStrategy(DataSourceStrategy $strategy): void
    {
        $this->strategy = $strategy;
    }

    /**
     * @param array<string, string> $params
     * @return array<string, string>
     */
    public function fetchArticles(array $params = []): array
    {
        return $this->strategy->fetchArticles($params);
    }
}
