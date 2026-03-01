<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\CoverImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Admin\SystemConfiguration\CompanyInformation;
use App\Models\Film;

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
        View::composer('*', function ($view) {


            $allCoverImages = CoverImage::all();
            view()->share('allCoverImages', $allCoverImages);

            $setting = Setting::first();
            $view->with('setting', $setting);


            $films_layout = Film::where('status', 1)->get();
            $view->with('films_layout', $films_layout);
        });
    }
}
