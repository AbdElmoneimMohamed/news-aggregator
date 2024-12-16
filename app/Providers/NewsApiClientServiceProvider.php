<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\ApiClient\BbcApiClient;
use App\Services\ApiClient\DataSourceContext;
use App\Services\ApiClient\GuardianApiClient;
use App\Services\ApiClient\NewsApiClient;
use Illuminate\Support\ServiceProvider;

class NewsApiClientServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->singleton(DataSourceContext::class, function () {
            return new DataSourceContext();
        });

        $this->app->bind(NewsApiClient::class, function () {
            return new NewsApiClient(
                config('news.news_api.base_url'),
                config('news.news_api.api_key')
            );
        });

        $this->app->bind(GuardianApiClient::class, function () {
            return new GuardianApiClient(
                config('news.guardian.base_url'),
                config('news.guardian.api_key')
            );
        });

        $this->app->bind(BbcApiClient::class, function () {
            return new BbcApiClient(
                config('news.bbc.base_url')
            );
        });
    }
}
