<?php

namespace Eliabrian\MangadexApi;

use Eliabrian\MangadexApi\MangadexApi;

class Manga extends MangadexApi
{
    private const MANGA_ENDPOINT = '/manga';
    private const RELATION_ENDPOINT = '/relation';

    /**
     * Get Manga Lists
     * 
     * @param array $queryParams
     * 
     * @return object
     * 
     */
    public function getMangas (array $queryParams) : object
    {
        $query = $this->buildQueryParams($queryParams);
        
        $response = $this->client->request('GET', self::MANGA_ENDPOINT, [
            'query' => $query,
        ]);

        if ($response->getStatusCode() === 200) {
            return json_decode($response->getBody());
        } else {
            return json_encode([
                'statusCode' => $response->getStatusCode(),
                'reason' => $response->getReasonPhrase(),
            ]);
        }
    }

    /**
     * Get Manga by MangaDex ID
     * 
     * @param string $id
     * @param bool $withRelationship
     * 
     * @return object
     */

    public function getMangaById (string $id, bool $withRelationship = false, array $queryParams = []) : object
    {
        $pathParam = $withRelationship ? $id . self::RELATION_ENDPOINT : $id;

        $query = !empty($queryParams) ? $this->buildQueryParams($queryParams) : [];

        $response = $this->client->request('GET', self::MANGA_ENDPOINT . '/' . $pathParam, [
            'query' => $query,
        ]);

        if ($response->getStatusCode() === 200) {
            return json_decode($response->getBody());
        } else {
            return json_encode([
                'statusCode' => $response->getStatusCode(),
                'reason' => $response->getReasonPhrase(),
            ]);
        }
    }

    /**
     * TODO: Get Random Manga
     * 
     * @return object
     */

    public function getRandomManga () : object
    {
    
    }
}