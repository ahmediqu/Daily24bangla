<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        $categories = Cache::remember('app-categories', 60, function() {
            return  DB::table('categories')->where('status', 1)->get();
        });

        view()->composer('*', function($view) use($categories){
            $view->with('categories', $categories);
        });
        Schema::defaultStringLength(191);
    }
}
