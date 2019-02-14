<?php

namespace Tests;

use App\AtlanticCity;
use WP_Mock\Tools\TestCase;
use WP_Mock;
use ReflectionMethod;

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

    public function testGetRandomLyric()
    {
        $atlantic = new AtlanticCity();

        $result1 = $atlantic->getRandomLyric();
        $result2 = $atlantic->getRandomLyric();
        $result3 = $atlantic->getRandomLyric();

        $this->assertTrue(in_array($result1, $atlantic->getLyrics()));
        $this->assertTrue(in_array($result2, $atlantic->getLyrics()));
        $this->assertTrue(in_array($result3, $atlantic->getLyrics()));
    }

    public function testGetCss()
    {
        WP_Mock::userFunction('is_rtl', [
            'times' => 1,
            'return' => true
        ]);

        $atlantic = new AtlanticCity();

        $method = new ReflectionMethod(AtlanticCity::class, 'getCss');
        $method->setAccessible(true);
        $result = $method->invoke($atlantic);

        $this->assertSame("<style type='text/css'>" .
            "#atlantic {" .
                "float: left;" .
                "padding-left: 15px;" .
                "padding-top: 5px;" .
                "margin: 0;" .
                "font-size: 11px;" .
            "}" .
            "</style>",
            $result
        );
    }

    public function testGetCssRight()
    {
        WP_Mock::userFunction('is_rtl', [
            'times' => 1,
            'return' => false
        ]);

        $atlantic = new AtlanticCity();

        $method = new ReflectionMethod(AtlanticCity::class, 'getCss');
        $method->setAccessible(true);
        $result = $method->invoke($atlantic);

        $this->assertSame("<style type='text/css'>" .
            "#atlantic {" .
                "float: right;" .
                "padding-right: 15px;" .
                "padding-top: 5px;" .
                "margin: 0;" .
                "font-size: 11px;" .
            "}" .
            "</style>",
            $result
        );
    }

    public function testGetHtmlOutput()
    {
        $atlantic = new AtlanticCity();

        $method = new ReflectionMethod(AtlanticCity::class, 'getHtmlOutput');
        $method->setAccessible(true);
        $result = $method->invoke($atlantic);

        $this->assertRegExp('/^<p id="atlantic">[a-zA-Z\s\.\']*<\/p>$/', $result);
    }
}
