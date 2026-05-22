<?php

use Kirby\Http\Remote;

return function () {
    $apiUrlMovies   = option('fk_feed.apiUrl.movies',   '');
    $apiUrlEpisodes = option('fk_feed.apiUrl.episodes', '');
    $token          = option('fk_feed.token',           '');

    if (!$apiUrlMovies || !$apiUrlEpisodes || !$token) {
        return ['movies' => [], 'episodes' => []];
    }

    $fetchFeed = function (string $url) use ($token) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_TIMEOUT        => 10,
            CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4,
            CURLOPT_HTTPHEADER     => [
                'Authorization: Bearer ' . $token,
                'Accept: application/json',
            ],
        ]);

        $body     = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlErr  = curl_error($ch);
        curl_close($ch);

        if ($body === false || $curlErr) {
            error_log('[fk_feed] curl error: ' . $curlErr . ' for URL: ' . $url);
            return [];
        }

        if ($httpCode !== 200) {
            error_log('[fk_feed] Unexpected status code: ' . $httpCode . ' for URL: ' . $url);
            return [];
        }

        $json = json_decode($body, true);

        $entries = $json['data'] ?? [];

        // limit to latest 6
        $entries = array_slice($entries, 0, 6);

        return array_map(function ($item) {

            $attributes = $item['attributes'] ?? [];

            // rating (0-10) -> stars (0-5 with half)
            $rating = $attributes['rating'] ?? 0;
            $value = $rating / 2;

            $fullStars = floor($value);
            $hasHalf = ($value - $fullStars) >= 0.5;

            $stars = str_repeat('★', $fullStars);
            if ($hasHalf) {
                $stars .= '½';
            }

            $poster = isset($attributes['poster_path'])
                ? 'https://image.tmdb.org/t/p/w500' . $attributes['poster_path']
                : null;

            // title (movie or series)
            $title = $attributes['title']
                ?? $attributes['series_title']
                ?? '';

            // episode code
            $code = $attributes['episode_label']
                ?? (
                isset($attributes['season_number'], $attributes['episode_number'])
                    ? 'S' . str_pad($attributes['season_number'], 2, '0', STR_PAD_LEFT)
                    . 'E' . str_pad($attributes['episode_number'], 2, '0', STR_PAD_LEFT)
                    : null
                );

            return [
                'id'      => $item['id'],
                'type'    => $item['type'] ?? null,
                'title'   => $title,
                'code'    => $code,
                'rating'  => $rating,
                'stars'   => $stars,
                'date'    => $attributes['watched_at'] ?? null,
                'poster'  => $poster,
            ];

        }, $entries);
    };

    $cache = kirby()->cache('fk_feed');

    $cacheOrFetch = function (string $key, string $url) use ($cache, $fetchFeed) {
        $cached = $cache->get($key);
        if ($cached !== null && count($cached) > 0) {
            return $cached;
        }
        $result = $fetchFeed($url);
        if (count($result) > 0) {
            $cache->set($key, $result, 60);
        }
        return $result;
    };

    return [
        'movies'   => $cacheOrFetch('movies',   $apiUrlMovies),
        'episodes' => $cacheOrFetch('episodes', $apiUrlEpisodes),
    ];
};