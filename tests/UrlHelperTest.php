<?php

use Pokedex\UrlHelper;

class UrlHelperTest extends PHPUnit\Framework\TestCase
{
    public function testShouldInstantiateObject()
    {
        $this->assertInstanceOf(UrlHelper::class, new UrlHelper());
    }

    /**
     * @dataProvider offsetDataProvider
     * @param $url
     * @param $expected
     */
    public function testShouldReturnOffset(?string $url, ?int $expected)
    {
        $this->assertEquals($expected, (new UrlHelper)->getOffset($url));
    }

    /**
     * @return array
     */
    public function offsetDataProvider()
    {
        return [
            ['https://pokeapi.co/api/v2/pokemon?offset=20&limit=20', 20],
            ['https://pokeapi.co/api/v2/pokemon?limit=20', 0],
            [null, null]
        ];
    }
}