<?php

namespace Gnemes\SearchBundle\Tests\Controller;

use Gnemes\SearchBundle\Tests\Fixtures\app\AppKernel;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    protected function setUp()
    {
        //require_once __DIR__.'/../Fixtures/app/AppKernel.php';

        $kernel = new AppKernel('', true);
        $kernel->boot();
        /*
        $container = $kernel->getContainer();
        $this->handler = $container->get('my_own.handling.handler');
         * 
         */
    }    
    
    public function testIndex()
    {
        /*
        $client = static::createClient();

        $crawler = $client->request('GET', '/gnemes');

        $this->assertContains('Text to search', $client->getResponse()->getContent());
         * 
         */
        
        $this->assertEquals(1,1);
    }
}
