<?php

declare(strict_types=1);

namespace App\Services\GuardianServices;

use App\DTO\ArticleDTO;
use Carbon\Carbon;

readonly class MapArticlesService
{
    /**
     * @param array<string, string> $articles
     * @return array<ArticleDTO>
     */
    public function __invoke(array $articles): array
    {
        return array_map(function ($article) {
            return new ArticleDTO(
                url: $article['webUrl'],
                title: $article['webTitle'],
                source: $article['type'],
                category: $article['sectionName'] ?? '',
                publishedAt: Carbon::parse($article['webPublicationDate'])->format('Y-m-d H:i:s'),
            );
        }, $articles['response']['results']);
    }
}
