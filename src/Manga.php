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
    public $query = [];

    /**
     * @var string
     */
    public $id = '';

    /**
     * @var string
     */
    public $url =  self::MANGA_ENDPOINT;

    /**
     * Method chain an include query to the request
     * 
     * @param array $include
     * 
     * @return array
     */
    public function includes (array $include)
    {
        $this->query['includes'] = $include;
        return $this;
    }

    /**
     * Method chain a limit query to the request
     * 
     * @param int $limit
     * 
     * @return array
     */
    public function limit (int $limit)
    {
        $this->query['limit'] = $limit;
        return $this;
    }

    /**
     * Method chain an offset query to the request
     * 
     * @param int $offset
     * 
     * @return array
     */
    public function offset (int $offset)
    {
        $this->query['offset'] = $offset;
        return $this;
    }

    /**
     * Method chain a title query to the request
     * 
     * @param string $title
     * 
     * @return array
     */
    public function title (string $title)
    {
        $this->query['title'] = $title;
        return $this;
    }

    /**
     * Method chain a translated languages query to the request
     * 
     * @param array $languages
     * 
     * @return array
     */
    public function language (array $languages)
    {
        $this->query['translatedLanguage'] = $languages;
        return $this;
    }

    /**
     * Method chain a Manga ID
     * 
     * @param string $id
     * 
     * @return string
     */
    public function id (string $id)
    {
        $this->url .= '/' . $id;
        return $this;
    }

    /**
     * Method chain a aggregate to Manga ID request
     * 
     * @return string
     */
    public function aggregate ()
    {
        $this->url .= self::AGGREGATE_ENDPOINT;
        return $this;
    }

    /**
     * Method chain a relation to Manga ID request
     * 
     * @return string
     */
    public function withRelation ()
    {
        $this->url .= self::RELATION_ENDPOINT;
        return $this;
    }

    /**
     * Method chain a random manga to the request
     * 
     * @return string
     */
    public function random ()
    {
        $this->url .= self::RANDOM_ENDPOINT;
        return $this;
    }

    /**
     * Method chain manga tags to the request
     * 
     * @return string
     */
    public function tag ()
    {
        $this->url .= self::TAG_ENDPOINT;
        return $this;
    }

    /**
     * Method chain manga feeds to the request
     * 
     * @return string
     */
    public function feed ()
    {
        $this->url .= self::FEED_ENDPOINT;
        return $this;
    }

    /**
     * Get Manga Lists
     * 
     * @param array $queryParams
     * 
     * @return object
     * 
     */
    public function get () : object
    {   
        $response = $this->client->request('GET', $this->url, [
            'query' => $this->query,
        ]);

        return $this->handleResponse($response);
    }
}