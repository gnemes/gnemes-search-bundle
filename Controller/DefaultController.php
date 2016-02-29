<?php

namespace Gnemes\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GnemesSearchBundle:Default:index.html.twig');
    }
}
