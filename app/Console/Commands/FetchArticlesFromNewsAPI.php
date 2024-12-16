<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Services\NewsApiServices\FetchArticlesService;
use App\Services\NewsApiServices\MapArticlesService;
use App\Services\NewsApiServices\SaveArticlesService;
use Illuminate\Console\Command;

final class FetchArticlesFromNewsAPI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:fetch-articles-from-news-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetching news articles from news api';

    public function __construct(
        private readonly FetchArticlesService $fetchArticlesService,
        private readonly MapArticlesService $mapArticlesService,
        private readonly SaveArticlesService $saveArticlesService
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $articles = ($this->fetchArticlesService)();

        $mappedArticles = ($this->mapArticlesService)($articles);

        ($this->saveArticlesService)($mappedArticles);

        $this->info('Fetched articles from NewsAPI.');
    }
}
