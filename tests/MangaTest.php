<?php declare(strict_types=1);

use Eliabrian\MangadexApi\Manga;
use PHPUnit\Framework\TestCase;

final class MangaTest extends TestCase
{
    /**
     * Assert get all Mangas
     */
    public function testGetAllManga () : void
    {
        $mangadex = new Manga();

        $mangas = $mangadex->limit(1)
            ->offset(0)
            ->get();

        $this->assertEquals('ok', $mangas->result);
    }

    /**
     * Assert get Manga by MangaDex ID
     */
    public function testGetMangaById () : void
    {
        $mangadex = new Manga();

        $manga = $mangadex->id('a96676e5-8ae2-425e-b549-7f15dd34a6d8')
            ->withRelation()
            ->includes(['artist'])
            ->get();

        $this->assertEquals('ok', $manga->result);
    }

    /**
     * Assert get a random manga
     */
    public function testGetRandomManga () : void
    {
        $mangadex = new Manga();

        $manga = $mangadex->random()
            ->includes(['artist'])
            ->get();

        $this->assertEquals('ok', $manga->result);
    }

    /**
     * Assert get a aggregate by manga ID
     */
    public function testGetMangaAggregate () : void
    {
        $mangadex = new Manga();
        $manga = $mangadex->id('a96676e5-8ae2-425e-b549-7f15dd34a6d8')
            ->aggregate()
            ->get();
        
        $this->assertEquals('ok', $manga->result);
    }

    /**
     * Assert get all manga tags
     */
    public function testGetMangaTags () : void
    {
        $mangadex = new Manga();

        $tags = $mangadex->tag()
            ->get();

        $this->assertEquals('ok', $tags->result);
    }

    /**
     * Assert get manga feeds
     */
    public function testGetMangaFeeds () : void
    {
        $mangadex = new Manga();

        $feeds = $mangadex->id('a96676e5-8ae2-425e-b549-7f15dd34a6d8')
            ->feed()
            ->language(['en'])
            ->get();

        $this->assertEquals('ok', $feeds->result);
    }
}