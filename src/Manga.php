<?php

namespace Eliabrian\MangadexApi;

use Eliabrian\MangadexApi\MangadexApi;

class Manga extends MangadexApi
{
    private const AGGREGATE_ENDPOINT = '/aggregate';
    private const FEED_ENDPOINT = '/feed';
    private const MANGA_ENDPOINT = '/manga';
    private const RELATION_ENDPOINT = '/relation';
    private const RANDOM_ENDPOINT = '/random';
    private const TAG_ENDPOINT = '/tag';

    /**
     * @var array
     */
    public array $query = [];

    /**
     * @var string
     */
    public string $id = '';

    /**
     * @var string
     */
    public string $url =  self::MANGA_ENDPOINT;

    /**
     * Method chains an included query to the request
     * 
     * @param array $include
     * 
     * @return Manga
     */
    public function includes (array $include): Manga
    {
        $this->query['includes'] = $include;
        return $this;
    }

    /**
     * Method chains a limit query to the request
     * 
     * @param int $limit
     * 
     * @return Manga
     */
    public function limit (int $limit): Manga
    {
        $this->query['limit'] = $limit;
        return $this;
    }

    /**
     * Method chain an offset query to the request
     * 
     * @param int $offset
     * 
     * @return Manga
     */
    public function offset (int $offset): Manga
    {
        $this->query['offset'] = $offset;
        return $this;
    }

    /**
     * Method chain a title query to the request
     * 
     * @param string $title
     * 
     * @return Manga
     */
    public function title (string $title): Manga
    {
        $this->query['title'] = $title;
        return $this;
    }

    /**
     * Method chain a translated languages query to the request
     * 
     * @param array $languages
     * 
     * @return Manga
     */
    public function language (array $languages): Manga
    {
        $this->query['translatedLanguage'] = $languages;
        return $this;
    }

    /**
     * Method chain a Manga ID
     * 
     * @param string $id
     * 
     * @return Manga
     */
    public function id (string $id): Manga
    {
        $this->url .= '/' . $id;
        return $this;
    }

    /**
     * Method chain a aggregate to Manga ID request
     * 
     * @return Manga
     */
    public function aggregate (): Manga
    {
        $this->url .= self::AGGREGATE_ENDPOINT;
        return $this;
    }

    /**
     * Method chain a relation to Manga ID request
     * 
     * @return Manga
     */
    public function withRelation () : Manga
    {
        $this->url .= self::RELATION_ENDPOINT;
        return $this;
    }

    /**
     * Method chain a random manga to the request
     * 
     * @return Manga
     */
    public function random () : Manga
    {
        $this->url .= self::RANDOM_ENDPOINT;
        return $this;
    }

    /**
     * Method chain manga tags to the request
     * 
     * @return Manga
     */
    public function tag () : Manga
    {
        $this->url .= self::TAG_ENDPOINT;
        return $this;
    }

    /**
     * Method chain manga feeds to the request
     * 
     * @return Manga
     */
    public function feed () : Manga
    {
        $this->url .= self::FEED_ENDPOINT;
        return $this;
    }

    /**
     * Get Manga Lists
     *
     * @return object
     */
    public function get () : object
    {   
        $response = $this->client->request('GET', $this->url, [
            'query' => $this->query,
        ]);

        return $this->handleResponse($response);
    }
}