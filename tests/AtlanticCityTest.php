<?php

namespace Tests;

use App\AtlanticCity;
use WP_Mock\Tools\TestCase;

class AtlanticCityTest extends TestCase
{
    public function testAtlanticCity()
    {
        $atlantic = new AtlanticCity();

        $this->assertInstanceOf(AtlanticCity::class, $atlantic);
    }

    public function testGetLyrics()
    {
        $atlantic = new AtlanticCity();

        $result = $atlantic->getLyrics();

        $this->assertCount(35, $result);
    }

    public function testGetLyricsCheckLyric()
    {
        $atlantic = new AtlanticCity();

        $result = $atlantic->getLyrics();

        $this->assertSame("Well they blew up the chicken man in Philly last night", $result[0]);
        $this->assertSame("Now baby everything dies baby that's a fact", $result[16]);
        $this->assertSame("Meet me tonight in Atlantic City", $result[34]);
    }
}
