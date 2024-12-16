<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleFilterRequest;
use App\Services\Filter\ArticleFilterService;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{
    public function __construct(
        private ArticleFilterService $articleService
    ) {
    }

    public function index(ArticleFilterRequest $request): JsonResponse
    {
        $filters = $request->validated();

        $articles = $this->articleService->getFilteredArticles($filters);

        return response()->json($articles);
    }
}
