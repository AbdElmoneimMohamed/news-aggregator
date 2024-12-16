<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Services\GuardianServices\FetchArticlesService;
use App\Services\GuardianServices\MapArticlesService;
use App\Services\GuardianServices\SaveArticlesService;
use Illuminate\Console\Command;

final class FetchArticlesFromGuardian extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:fetch-articles-from-guardian';

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

        $this->info('Fetched articles from Guardian.');
    }
}
