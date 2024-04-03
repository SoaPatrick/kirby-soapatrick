<?php

use Kirby\Uuid\Uuid;

class MoviesPage extends Page {

    public function children(): Pages
    {

        if ($this->children instanceof Pages) {
            return $this->children;
        }

        $results = [];
        $pages   = [];

        try {
            // use the URL of the feed you want to fetch
            $request = Remote::get('https://letterboxd.com/soapatrick/rss/', ['timeout' => 5]);

            // if the request was sucessfully, parse feed as $results
            if ($request->code() === 200) {
                $results = Xml::parse($request->content());
            }
        } catch (Exception $e) {
            // Fehler wurde abgefangen, nichts wird ausgegeben
        }

        // if we have any results, create the child page props for each result
        if (count($results) > 0) {
            foreach ($results['channel']['item'] as $item) {
                $pages[] = [
                    'slug'     => Str::slug($item['title']),
                    'template' => 'feeditem',
                    'model'    => 'feeditem',
                    'content'  => [
                        'title'       => $item['title'],
                        'published'   => $item['pubDate'] ?? '',
                        'description' => $item['description'] ?? '',
                        'link'        => $item['link'] ?? '',
                        'text'        => $item['contentencoded'] ?? '',
                        'uuid'        => Uuid::generate(),
                    ]
                ];
            }
        }

        // create a Pages collection for the child pages
        return $this->children = Pages::factory($pages, $this);
    }

}