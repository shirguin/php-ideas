<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use App\Models\User;   

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        View::share("topUsers", User::withCount('ideas')->orderBy('ideas_count','DESC')->limit(5)->get());//Глобальная переменная Blade

        //app()->setLocale('ru');//Смена языка сайта
        //App::setLocale("ru"); //Смена языка сайта
    }
}
