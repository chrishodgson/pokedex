<?php

use Pokedex\Client;

class ClientTest extends PHPUnit\Framework\TestCase
{
    public function testShouldInstantiateObject()
    {
        $this->assertInstanceOf(Client::class, new Client());
    }
}