<?php

declare(strict_types=1);

namespace Tests\Commands\Bjyblog;

use File;
use Tests\TestCase;

class GenerateSitemap extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCommand()
    {
        $sitemapPath = public_path('sitemap.xml');

        File::delete($sitemapPath);

        static::assertFileNotExists($sitemapPath);

        $this->artisan('bjyblog:generateSitemap');

        static::assertFileExists($sitemapPath);
        static::assertEquals(File::get(base_path('tests/Commands/_baseline/Bjyblog/GenerateSitemap/sitemap.xml')), File::get($sitemapPath));
    }
}
