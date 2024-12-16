<?php

declare(strict_types=1);

namespace App\Services\NewsApiServices;

use App\DTO\ArticleDTO;
use Carbon\Carbon;

readonly class MapArticlesService
{
    /**
     * @param array<string, string> $articles
     * @return array<int, ArticleDTO>
     */
    public function __invoke(array $articles): array
    {
        return array_map(function ($article) {
            return new ArticleDTO(
                url: $article['url'],
                title: $article['title'],
                content: $article['content'],
                description: $article['description'],
                author: $article['author'],
                source: $article['source']['name'],
                category: $article['category'] ?? '',
                publishedAt: Carbon::parse($article['publishedAt'])->format('Y-m-d H:i:s'),
            );
        }, $articles['articles']);
    }
}
