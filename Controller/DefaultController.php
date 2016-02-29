<?php

namespace Gnemes\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $params = array();
        $params["gnemes"] = array(
            "title" => "Gnemes text in file search engine",
        );
        
        return $this->render(
            'GnemesSearchBundle:Default:index.html.twig', 
            $params
        );
    }
}
