<?php

declare(strict_types=1);

namespace App\Repositories;

use App\DTO\ArticleDTO;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

interface ArticleRepositoryInterface
{
    /**
     * @return Collection<int, Article>
     */
    public function all(): Collection;

    public function upsert(ArticleDTO $article): void;

    public function deleteOldArticles(): void;
}
