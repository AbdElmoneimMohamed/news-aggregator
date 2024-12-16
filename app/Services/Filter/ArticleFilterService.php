<?php

declare(strict_types=1);

namespace App\Services\Filter;

use App\Models\Article;

final readonly class ArticleFilterService
{
    /**
     * @param string[] $filters
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getFilteredArticles(array $filters)
    {
        $query = Article::query();

        if (! empty($filters['search'])) {
            $query->whereRaw('MATCH(title, description, content) AGAINST(? IN NATURAL LANGUAGE MODE)', [$filters['search']]);
        }

        if (! empty($filters['category'])) {
            $query->where('category', $filters['category']);
        }

        if (! empty($filters['source'])) {
            $query->where('source', $filters['source']);
        }

        if (! empty($filters['author'])) {
            $query->where('author', $filters['author']);
        }

        if (! empty($filters['start_date']) && (isset($filters['end_date']) && ($filters['end_date'] !== '' && $filters['end_date'] !== '0'))) {
            $query->whereBetween('published_at', [$filters['start_date'], $filters['end_date']]);
        }

        return $query->orderBy('published_at', 'desc')->paginate(10);
    }
}
