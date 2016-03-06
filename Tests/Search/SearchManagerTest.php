<?php

namespace Gnemes\SearchBundle\Tests\Search;

use Gnemes\SearchBundle\Search\SearchManager;

class SearchManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testSearchOrmSuccess()
    {
        $search = new SearchManager("orm");

        $expected = array(
            "status" => "success",
            "source" => "orm",
            "response" => "Searching on ORM: Unit testing",
        );
        
        $this->assertEquals(json_encode($expected), $search->search("Unit testing"));
    }
    
    public function testSearchElasticSuccess()
    {
        $search = new SearchManager("elastic");

        $expected = array(
            "status" => "success",
            "source" => "elastic",
            "response" => "Searching on Elastic: Unit testing",
        );
        
        $this->assertEquals(json_encode($expected), $search->search("Unit testing"));
    }
}
