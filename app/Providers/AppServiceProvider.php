<?php

namespace App\Providers;
use App\Models\Budget;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;

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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){

    if (Schema::hasTable('budgets')) {
        $budgets = Budget::all();
        View::share('budgets', $budgets);
    }
}
}
