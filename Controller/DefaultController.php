<?php
/**
 * Gnemes Search Bundle
 * Copyright (C) 2016  German Nemes
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * PHP VERSION 5.6
 *
 * @category  Bundle
 * @package   GnemesSearchBundle
 * @author    German Nemes <gnemes@gmail.com>
 * @copyright 2016 German Nemes
 * @license   GNU GPL v3
 * @link      https://github.com/gnemes/aprildesign
 */

namespace Gnemes\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Gnemes\SearchBundle\Entity\Needle;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * Gnemes Search Bundle controller Class
 *
 * @category  Bundle
 * @package   GnemesSearchBundle
 * @author    German Nemes <gnemes@gmail.com>
 * @copyright 2016 German Nemes
 * @license   GNU GPL v3
 * @link      https://github.com/gnemes/aprildesign
 */
class DefaultController extends Controller
{
    /**
     * Main action
     * 
     * @param Request $request Symfony request
     * 
     * @return Twig template
     */
    public function indexAction(Request $request)
    {
        echo $this->container->getParameter('source');
        
        // Init needle entity
        $needle = new Needle();
        
        // Create form
        $form = $this->createFormBuilder($needle)
            ->setAction($this->generateUrl('gnemes_search_homepage'))
            ->setMethod('POST')    
            ->add(
                'needle', 
                TextType::class, 
                array(
                    'label' => false
                )
            )
            ->add('save', SubmitType::class, array('label' => 'Search'))
            ->getForm();
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $search = $this->get("gnemes.search.controller");
            $response = $search->indexAction();
            $text = 'This is the response: '.$response;
            echo "ou yeah! ".$text;
        }
        
        // Template vars
        $page = array(
            "title" => "Gnemes text in file search engine",
        );
        
        return $this->render(
            'GnemesSearchBundle:Default:index.html.twig', 
            array(
                'form' => $form->createView(),
                'gnemes' => $page,
            )
        );
    }
}
