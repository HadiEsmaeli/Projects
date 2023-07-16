<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\ {
    Banner,
    PageOtherItem,
    Setting,
};

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::useBootstrap();

        $banner = Banner::where('id', 1)->first();
        view()->share('global_banner', $banner);

        $page_other_data = PageOtherItem::where('id', 1)->first();
        view()->share('global_page_other_data', $page_other_data);

        $setting = Setting::where('id', 1)->first();
        view()->share('global_setting', $setting);

    }
}
