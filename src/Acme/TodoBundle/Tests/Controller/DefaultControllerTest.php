<?php

namespace Acme\TodoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/todo');

        $this->assertTrue($crawler->filter('html:contains("Todo list")')->count() > 0);
    }
}
