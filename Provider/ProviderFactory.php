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
 * @category  Bundle/Provider
 * @package   GnemesSearchBundle
 * @author    German Nemes <gnemes@gmail.com>
 * @copyright 2016 German Nemes
 * @license   GNU GPL v3
 * @link      https://github.com/gnemes/aprildesign
 */

namespace Gnemes\SearchBundle\Provider;

use Gnemes\SearchBundle\Provider\ProviderOrm;
use Gnemes\SearchBundle\Provider\ProviderElastic;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Gnemes Search Bundle command Class
 *
 * @category  Bundle/Provider
 * @package   GnemesSearchBundle
 * @author    German Nemes <gnemes@gmail.com>
 * @copyright 2016 German Nemes
 * @license   GNU GPL v3
 * @link      https://github.com/gnemes/aprildesign
 */
class ProviderFactory
{
    protected $container;
    
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }
    
    /**
     * Provider factory method
     * 
     * @param String $source Source
     * 
     * @return Mixed
     */
    public function create()
    {
        $source = $this->container->getParameter("gnemes.search.source");
        
        switch ($source) {
            case "orm":
                $provider = new ProviderOrm();
                $provider->setTable($this->container->getParameter("gnemes.search.orm.table"))
                         ->setField($this->container->getParameter("gnemes.search.orm.field"));
                break;
            default:
                $provider = new ProviderElastic();
                break;
        }
        
        return $provider;
    }
}