<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use Livewire\Volt\Volt;
use Illuminate\Support\ServiceProvider;

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
        View::composer('frontend.partial.header', function ($view) {

            $parentCategory = Category::with('subcategories')
                ->where('status', 1)
                ->get();

            $view->with('parentCategory', $parentCategory);
        });
Volt::mount([
    resource_path('views/components'),
]);
    }
}
