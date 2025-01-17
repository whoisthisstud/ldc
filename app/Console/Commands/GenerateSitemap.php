<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Psr\Http\Message\UriInterface;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        SitemapGenerator::create(config('app.url'))
            ->shouldCrawl(function (UriInterface $url) {
                // All pages will be crawled, except the following pages.
                return strpos($url->getPath(), '/admin/') === false;
                return strpos($url->getPath(), '/business-manager/') === false;
                return strpos($url->getPath(), '/password/reset') === false;
                return strpos($url->getPath(), '/login') === false;

            })
            ->writeToFile(public_path('sitemap.xml'));
    }
}
