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
 * @category  Bundle/Command
 * @package   GnemesSearchBundle
 * @author    German Nemes <gnemes@gmail.com>
 * @copyright 2016 German Nemes
 * @license   GNU GPL v3
 * @link      https://github.com/gnemes/aprildesign
 */

namespace Gnemes\SearchBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Gnemes Search Bundle command Class
 *
 * @category  Bundle/Command
 * @package   GnemesSearchBundle
 * @author    German Nemes <gnemes@gmail.com>
 * @copyright 2016 German Nemes
 * @license   GNU GPL v3
 * @link      https://github.com/gnemes/aprildesign
 */
class SearchCommand extends ContainerAwareCommand
{
    /**
     * Configure command interface
     * 
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName('gnemes:search')
            ->setDescription('Search text')
            ->addArgument(
                'text',
                InputArgument::OPTIONAL,
                'What do you want to search?'
            )
        ;
    }
    
    /**
     * Executes command
     * 
     * @param InputInterface $input   Command input
     * @param OutputInterface $output Command output
     * 
     * @return String
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $text = $input->getArgument('text');
        if ($text) {
            $search = $this->getContainer()->get('gnemes.search.manager');
            $response = $search->search($text);
            $text = 'This is the response: '.$response;
        } else {
            $text = 'You have to tell me what do you want to search.';
        }

        $output->writeln($text);
    }
}    