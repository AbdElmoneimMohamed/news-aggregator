<?php

declare(strict_types=1);

namespace App\Services\BbcServices;

use App\DTO\ArticleDTO;
use App\Repositories\ArticleRepositoryInterface;

readonly class SaveArticlesService
{
    public function __construct(
        private ArticleRepositoryInterface $articleRepository
    ) {
    }

    /**
     * @param ArticleDTO[] $articles
     */
    public function __invoke(array $articles): void
    {
        foreach ($articles as $article) {
            $this->articleRepository->upsert($article);
        }
    }
}
