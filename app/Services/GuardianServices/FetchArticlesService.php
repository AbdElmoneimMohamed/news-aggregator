<?php

declare(strict_types=1);

namespace App\Services\GuardianServices;

use App\Services\ApiClient\DataSourceContext;
use App\Services\ApiClient\GuardianApiClient;

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
        $this->context->setStrategy(app(GuardianApiClient::class));

        return $this->context->fetchArticles([
            'from-date' => now()->subDay()->toDateString(),
            'q' => 'debates',
        ]);
    }
}
