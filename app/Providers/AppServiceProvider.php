<?php

namespace App\Providers;

use PhpParser\Parser;
use PhpParser\ParserFactory;
use App\Domain\Ports\FileService;
use Illuminate\Support\ServiceProvider;
use App\Domain\Ports\AnalyzeService;
use App\Infrastructure\File\Adapters\FileServiceAdapter;
use App\Infrastructure\Analyze\Adapters\AnalyzeServiceAdapter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Parser::class, function ($app) {

            $parserFactory = new ParserFactory();

            return $parserFactory->create(ParserFactory::PREFER_PHP7);
        });

        $this->app->bind(FileService::class, FileServiceAdapter::class);
        $this->app->bind(AnalyzeService::class, AnalyzeServiceAdapter::class);
    }
}
