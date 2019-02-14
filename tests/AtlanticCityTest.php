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

        $method = new ReflectionMethod(AtlanticCity::class, 'getLyrics');
        $method->setAccessible(true);
        $result = $method->invoke($atlantic);

        $this->assertCount(35, $result);
    }

    public function testGetLyricsCheckLyric()
    {
        $atlantic = new AtlanticCity();

        $method = new ReflectionMethod(AtlanticCity::class, 'getLyrics');
        $method->setAccessible(true);
        $result = $method->invoke($atlantic);

        $this->assertSame("Well they blew up the chicken man in Philly last night", $result[0]);
        $this->assertSame("Now baby everything dies baby that's a fact", $result[16]);
        $this->assertSame("Meet me tonight in Atlantic City", $result[34]);
    }

    public function testGetRandomLyric()
    {
        $atlantic = new AtlanticCity();

        $method = new ReflectionMethod(AtlanticCity::class, 'getRandomLyric');
        $method->setAccessible(true);
        $result1 = $method->invoke($atlantic);
        $result2 = $method->invoke($atlantic);
        $result3 = $method->invoke($atlantic);

        $method = new ReflectionMethod(AtlanticCity::class, 'getLyrics');
        $method->setAccessible(true);
        $lyrics = $method->invoke($atlantic);

        $this->assertTrue(in_array($result1, $lyrics));
        $this->assertTrue(in_array($result2, $lyrics));
        $this->assertTrue(in_array($result3, $lyrics));
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
