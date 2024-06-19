<?php

namespace App\Http\Controllers;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use App\Models\Language;
use App\Models\Movie;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = Sitemap::create();
        $domain = config('app.url');

        $sitemap->add(
            Url::create($domain)
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_NEVER)
                ->setPriority(1.0)
        );

        $sitemap->add(
            Url::create($domain . "/privacy-policy")
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_NEVER)
                ->setPriority(0.8)
        );

        $sitemap->add(
            Url::create($domain . "/terms-of-service")
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_NEVER)
                ->setPriority(0.8)
        );

        $sitemap->add(
            Url::create($domain . "/about")
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_NEVER)
                ->setPriority(0.8)
        );

        $sitemap->add(
            Url::create($domain . "/contact")
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_NEVER)
                ->setPriority(0.8)
        );

        $sitemap->add(
            Url::create($domain . "/movie/latest")
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_NEVER)
                ->setPriority(0.8)
        );
        
        $movies = Movie::all();
        foreach ($movies as $movie) {
            $sitemap->add(
                Url::create($domain . "/get-movie/{$movie->id}")
                    ->setLastModificationDate($movie->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                    ->setPriority(0.8)
            );
        }
        
        $languages = Language::all();
        foreach ($languages as $language) {
            $sitemap->add(
                Url::create($domain . "/movie/language?id={$language->id}")
                    ->setLastModificationDate($language->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                    ->setPriority(0.8)
            );
        }

        $xmlContent = $this->generateSitemapXml($sitemap);

        return Response::make($xmlContent, 200, [
            'Content-Type' => 'application/xml',
            'Content-Disposition' => 'attachment; filename="sitemap.xml"',
        ]);
    }

    private function generateSitemapXml(Sitemap $sitemap)
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
$xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" ';
        $xml .= ' xmlns:xhtml="http://www.w3.org/1999/xhtml" ';
        $xml .= ' xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" ';
        $xml .= ' xmlns:video="http://www.google.com/schemas/sitemap-video/1.1" ';
        $xml .= ' xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">' . PHP_EOL;

    foreach ($sitemap->getTags() as $tag) {
    $xml .= ' <url>' . PHP_EOL;
        $xml .= ' <loc>' . htmlspecialchars($tag->url) . '</loc>' . PHP_EOL;
        if ($tag->lastModificationDate) {
        $xml .= ' <lastmod>' . $tag->lastModificationDate->toAtomString() . '</lastmod>' . PHP_EOL;
        }
        if ($tag->changeFrequency) {
        $xml .= ' <changefreq>' . $tag->changeFrequency . '</changefreq>' . PHP_EOL;
        }
        if ($tag->priority) {
        $xml .= ' <priority>' . $tag->priority . '</priority>' . PHP_EOL;
        }
        $xml .= ' </url>' . PHP_EOL;
    }

    $xml .= '</urlset>';

return $xml;
}



}