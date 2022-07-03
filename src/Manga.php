<?php

namespace Eliabrian\MangadexApi;

use Eliabrian\MangadexApi\MangadexApi;

class Manga extends MangadexApi
{
    private const MANGA_ENDPOINT = '/manga';
    private const RELATION_ENDPOINT = '/relation';
    private const RANDOM_ENDPOINT = '/random';
    private const TAG_ENDPOINT = '/tag';

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

        return $this->handleResponse($response);
    }

    /**
     * Get Manga by MangaDex ID
     * 
     * @param string $id
     * @param bool $withRelationship
     * @param array $queryParams
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

        return $this->handleResponse($response);
    }

    /**
     * Get a random Manga
     * 
     * @param array $queryParams
     * 
     * @return object
     */

    public function getRandomManga (array $queryParams = []) : object
    {
        $query = $this->buildQueryParams($queryParams);

        $response = $this->client->request('GET', self::MANGA_ENDPOINT . self::RANDOM_ENDPOINT, [
            'query' => $query,
        ]);

        return $this->handleResponse($response);
    }

    /**
     * Get all manga tags
     * 
     * @return object
     */
    public function getMangaTags () : object
    {
        $response = $this->client->request('GET', self::MANGA_ENDPOINT . self::TAG_ENDPOINT);

        return $this->handleResponse($response);
    }

    /**
     * TODO: Get manga volumes and chapters
     * 
     * @param array $queryParams
     * 
     * @return object
     */
    public function getMangaAggregate(Type $var = null)
    {
        //
    }
}