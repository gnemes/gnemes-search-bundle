<?php

namespace Gnemes\SearchBundle\Tests\Search;

use Gnemes\SearchBundle\Search\SearchManager;

class SearchManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testSearch()
    {
        $search = new SearchManager("orm");

        $expected = array(
            "status" => "success",
            "source" => "orm",
            "response" => "Searching on ORM: Unit testing",
        );
        
        $this->assertEquals(json_encode($expected), $search->search("Unit testing"));
    }
}
