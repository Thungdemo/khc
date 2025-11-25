<?php

namespace App\Providers;

use Illuminate\View\View;
use App\Helpers\DateHelper;
use App\Models\NoticeCategory;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Facades\View::composer('layouts.portal', function (View $view) {
            $view->with('navbarNotices', NoticeCategory::isParent()->sort()->get());

            $lastUpdatedAt = cache()->remember('last_updated_at', 600, function () {
                return DB::selectOne("
                    SELECT MAX(updated_at) as updated_at FROM (
                    SELECT updated_at FROM notices
                    UNION ALL
                    SELECT updated_at FROM former_judges
                    UNION ALL
                    SELECT updated_at FROM advocate_generals
                    UNION ALL
                    SELECT updated_at FROM gallery_images
                    UNION ALL
                    SELECT updated_at FROM calendars
                    UNION ALL
                    SELECT updated_at FROM legal_committees
                    UNION ALL
                    SELECT updated_at FROM station_judges
                    UNION ALL
                    SELECT updated_at FROM statistics
                    ) as all_updates
                ")?->updated_at;
            });

            $view->with('lastUpdatedAt', DateHelper::date($lastUpdatedAt));
        });
    }
}
