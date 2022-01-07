<?php

class MoviesPage extends Page {

    public function children()
    {
        $results = [];
        $pages   = [];

        // use the URL of the feed you want to fetch
        $request = Remote::get('https://letterboxd.com/soapatrick/rss/');

        // if the request was sucessfully, parse feed as $results
        if ($request->code() === 200) {
            $results = Xml::parse($request->content());
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
                    ]
                ];
            }
        }

        // create a Pages collection for the child pages
        return Pages::factory($pages, $this);
    }

}