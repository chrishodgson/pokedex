<?php

use PHPUnit\Framework\MockObject\MockObject;
use Pokedex\Client;
use Pokedex\Pokemon;

class PokemonTest extends PHPUnit\Framework\TestCase
{
    /**
     * @var MockObject|Client
     */
    private $client;

    protected function setUp(): void
    {
        $this->client = $this->createMock(Client::class);
    }

    public function testShouldInstantiateObject()
    {
        $this->assertInstanceOf(Pokemon::class, new Pokedex\Pokemon($this->client));
    }

    /**
     * @dataProvider requestDataProvider
     * @param string $url
     * @param null|string $identifier
     * @param int|null $offset
     */
    public function testShouldSendCorrectRequest(string $url, ?string $identifier, ?int $offset)
    {
        $expected = ['data'];
        $output = json_encode($expected);
        $this->client->expects($this->once())
            ->method('request')
            ->with($this->equalTo($url))
            ->willReturn($output);
        $sut = new Pokemon($this->client);
        $this->assertEquals($expected, $sut->get($identifier, $offset));
    }

    /**
     * @return array
     */
    public function requestDataProvider()
    {
        return [
            ['pokemon/bulbasaur?offset=20', 'bulbasaur', 20],
            ['pokemon/?offset=20', null, 20],
            ['pokemon/?offset=0', null, null],
        ];
    }
}