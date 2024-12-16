<?php

declare(strict_types=1);

namespace App\Services\BbcServices;

use App\Services\ApiClient\BbcApiClient;
use App\Services\ApiClient\DataSourceContext;

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
        $this->context->setStrategy(app(BbcApiClient::class));

        return $this->context->fetchArticles([
            'lang' => 'english',
        ]);
    }
}
