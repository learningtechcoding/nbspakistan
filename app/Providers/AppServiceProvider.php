<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
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
        // $this->app->bind('path.public', function () {
        //     return base_path() . '/public_html';
        // });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        //General [announcement][latest-news]
        $generalJsonString = Storage::get("/private/general.txt");
        $generalJson = json_decode($generalJsonString, true);
        if ($generalJson) {
            $announcementString = trim($generalJson["announcement-string"]);
            $latestNews = trim($generalJson["latest-news"]);
        } else {
            $announcementString = "";
            $latestNews = "";
        }

        view()->share('announcementString', $announcementString);
        view()->share('latestNews', $latestNews);

        $routes = [
            "Advisory Board" => [
                "Advisory Board - Central Cabinet",
                "Advisory Board - Twin Cities Zone",
                "Advisory Board - Punjab",
                "Advisory Board - KPK",
                "Advisory Board - Sindh",
                "Advisory Board - Balochistan",
                "Advisory Board - Gilgit-Baltistan",
                "Advisory Board - Azad Jammu Kashmir"
            ],
            "Lawyer's Forum" => [
                "Lawyer's Forum - Central Cabinet",
                "Lawyer's Forum - Twin Cities Zone",
                "Lawyer's Forum - Punjab",
                "Lawyer's Forum - KPK",
                "Lawyer's Forum - Sindh",
                "Lawyer's Forum - Balochistan",
                "Lawyer's Forum - Gilgit-Baltistan",
                "Lawyer's Forum - Azad Jammu Kashmir"
            ],
            "General Body-Zone" => [
                "General Body-Zone - Central Cabinet",
                "General Body-Zone - Twin Cities Zone",
                "General Body-Zone - Punjab",
                "General Body-Zone - KPK",
                "General Body-Zone - Sindh",
                "General Body-Zone - Balochistan",
                "General Body-Zone - Gilgit-Baltistan",
                "General Body-Zone - Azad Jammu Kashmir"
            ],
            "Universities Council" => [
                "Universities Council - Central Cabinet",
                "Universities Council - Twin Cities Zone",
                "Universities Council - Punjab",
                "Universities Council - KPK",
                "Universities Council - Sindh",
                "Universities Council - Balochistan",
                "Universities Council - Gilgit-Baltistan",
                "Universities Council - Azad Jammu Kashmir"
            ],
            "Literature Forum" => [
                "Literature Forum - Central Cabinet",
                "Literature Forum - Twin Cities Zone",
                "Literature Forum - Punjab",
                "Literature Forum - KPK",
                "Literature Forum - Sindh",
                "Literature Forum - Balochistan",
                "Literature Forum - Gilgit-Baltistan",
                "Literature Forum - Azad Jammu Kashmir"
            ],
            "Speaker Forum" => [
                "Speaker Forum - Central Cabinet",
                "Speaker Forum - Twin Cities Zone",
                "Speaker Forum - Punjab",
                "Speaker Forum - KPK",
                "Speaker Forum - Sindh",
                "Speaker Forum - Balochistan",
                "Speaker Forum - Gilgit-Baltistan",
                "Speaker Forum - Azad Jammu Kashmir"
            ],
            "Women Wing - UC" => [
                "Women Wing - UC - Central Cabinet",
                "Women Wing - UC - Twin Cities Zone",
                "Women Wing - UC - Punjab",
                "Women Wing - UC - KPK",
                "Women Wing - UC - Sindh",
                "Women Wing - UC - Balochistan",
                "Women Wing - UC - Gilgit-Baltistan",
                "Women Wing - UC - Azad Jammu Kashmir"
            ],
            "Women Wing" => [
                "Women Wing - Central Cabinet",
                "Women Wing - Twin Cities Zone",
                "Women Wing - Punjab",
                "Women Wing - KPK",
                "Women Wing - Sindh",
                "Women Wing - Balochistan",
                "Women Wing - Gilgit-Baltistan",
                "Women Wing - Azad Jammu Kashmir"
            ]
        ];

        view()->share('leadershipRoutes', $routes);
    }
}
