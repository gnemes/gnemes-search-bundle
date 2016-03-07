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

use Gnemes\SearchBundle\Interfaces\ProviderInterface;

/**
 * Gnemes Search ORM Provider
 *
 * @category  Bundle/Provider
 * @package   GnemesSearchBundle
 * @author    German Nemes <gnemes@gmail.com>
 * @copyright 2016 German Nemes
 * @license   GNU GPL v3
 * @link      https://github.com/gnemes/aprildesign
 */
class ProviderOrm implements ProviderInterface
{
    /**
     * Table name to search
     *
     * @var string
     */
    protected $table;
    
    /**
     * Full text indexed field name
     *
     * @var string
     */
    protected $field;
    
    /**
     * Search for a text into a filed
     * 
     * @param string $text Text to search
     * 
     * @return array
     */
    public function search($text)
    {
        return "Searching on ORM: ".$text. " :: Table: ".$this->table." :: Field: ".$this->field;
    }
    
    /**
     * Set table name
     * 
     * @param string $table Table name
     * 
     * @return \Gnemes\SearchBundle\Provider\ProviderOrm
     */
    public function setTable($table)
    {
        $this->table = $table;
        
        return $this;
    }
    
    /**
     * Set field name
     * 
     * @param string $field Field name
     * 
     * @return \Gnemes\SearchBundle\Provider\ProviderOrm
     */
    public function setField($field)
    {
        $this->field = $field;
        
        return $this;
    }
}