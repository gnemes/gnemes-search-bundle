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

namespace Gnemes\SearchBundle\Search;

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
class SearchManager
{
    public function search($source)
    {
        echo json_encode($source);
        
        $response = array(
            "status" => "success",
            "source" => $source,
        );
        
        return json_encode($response);
    }
}
