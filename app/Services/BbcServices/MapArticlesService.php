<?php

declare(strict_types=1);

namespace App\Services\BbcServices;

use App\DTO\ArticleDTO;

readonly class MapArticlesService
{
    /**
     * @param array<string, string> $articles
     * @return array<ArticleDTO>
     */
    public function __invoke(array $articles): array
    {
        $scienceCategory = $articles['Science & health'];

        return array_map(function ($article) {
            return new ArticleDTO(
                url: $article['news_link'],
                title: $article['title'],
                content: $article['summary'],
                category: 'Science & health'
            );
        }, $scienceCategory);
    }
}
