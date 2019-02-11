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
}
