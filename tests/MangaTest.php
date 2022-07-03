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

        $queryParams = [
            'limit' => 1,
            'offset' => 0,
        ];

        $mangas = $mangadex->getMangas($queryParams);

        $this->assertEquals('ok', $mangas->result);
    }

    /**
     * Assert get Manga by MangaDex ID
     */
    public function testGetMangaById () : void
    {
        $mangadex = new Manga();

        $manga = $mangadex->getMangaById('a96676e5-8ae2-425e-b549-7f15dd34a6d8', false, ['includes' => ['artist']]);

        $this->assertEquals('ok', $manga->result);
    }

    /**
     * Assert get a random manga
     */
    public function testGetRandomManga () : void
    {
        $mangadex = new Manga();

        $manga = $mangadex->getRandomManga();

        $this->assertEquals('ok', $manga->result);
    }

    /**
     * Assert get all manga tags
     */
    public function testGetMangaTags () : void
    {
        $mangadex = new Manga();

        $tags = $mangadex->getMangaTags();

        $this->assertEquals('ok', $tags->result);
    }
}