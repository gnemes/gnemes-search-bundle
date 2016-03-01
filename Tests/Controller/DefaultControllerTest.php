<?php

namespace Gnemes\SearchBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/gnemes');

        $this->assertContains('Text to search', $client->getResponse()->getContent());
    }
}
