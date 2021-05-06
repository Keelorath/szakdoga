<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Events\Dispatcher;
use TCG\Voyager\Facades\Voyager;
use ConsoleTVs\Charts\Registrar as Charts;

class AppServiceProvider extends ServiceProvider

{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        Voyager::addAction(\App\Actions\CloseAction::class);
        Voyager::addAction(\App\Actions\ArchiveAction::class);
        Voyager::addAction(\App\Actions\CancellationAction::class);
        Voyager::addAction(\App\Actions\PrintAction::class);
        $charts->register([
           \App\Charts\TotalProfitChart::class
        ]);

    }
}
