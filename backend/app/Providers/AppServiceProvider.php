<?php

namespace App\Providers;

use App\Charts\Factory\ChartFactoryImpl;
use App\Charts\Factory\Contracts\ChartFactory;
use App\Repositories\Contracts\RecordRepository;
use App\Repositories\FileRecordRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->singleton(RecordRepository::class, static function () {
            return new FileRecordRepository(storage_path('app/data.csv'));
        });
        app()->singleton(ChartFactory::class, ChartFactoryImpl::class);
    }
}
