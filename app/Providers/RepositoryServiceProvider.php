<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\BalanceRepository;
use App\Repositories\Contracts\TransactionRepository;
use App\Repositories\Contracts\ApplicationRepository;
use App\Repositories\EloquentBalanceRepository;
use App\Repositories\EloquentTransactionRepository;
use App\Repositories\EloquentApplicationRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(BalanceRepository::class, EloquentBalanceRepository::Class);
        $this->app->bind(TransactionRepository::class, EloquentTransactionRepository::Class);
        $this->app->bind(ApplicationRepository::class, EloquentApplicationRepository::Class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
