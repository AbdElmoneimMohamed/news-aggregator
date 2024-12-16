<?php

declare(strict_types=1);

namespace App\Repositories;

use App\DTO\ArticleDTO;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

final class ArticleRepository implements ArticleRepositoryInterface
{
    /**
     * @return Collection<int, Article>
     */
    public function all(): Collection
    {
        return Article::all();
    }

    public function upsert(ArticleDTO $article): void
    {
        Article::updateOrCreate(
            [
                'url' => $article->url,
            ],
            $article->toArray()
        );
    }

    public function deleteOldArticles(): void
    {
        Article::where('published_at', '<', now()->subDays(30))->delete();
    }
}
