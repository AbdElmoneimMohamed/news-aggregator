<?php

declare(strict_types=1);

namespace App\Services\NewsApiServices;

use App\Services\ApiClient\DataSourceContext;
use App\Services\ApiClient\NewsApiClient;

readonly class FetchArticlesService
{
    public function __construct(
        private DataSourceContext $context
    ) {
    }

    /**
     * @return array<string, string>
     */
    public function __invoke(): array
    {
        $this->context->setStrategy(app(NewsApiClient::class));

        return $this->context->fetchArticles([
            'from' => now()->subDay()->toDateString(),
            'q' => 'apple',
        ]);
    }
}
