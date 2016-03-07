<?php

namespace Gnemes\SearchBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('gnemes_search');

        $supportedSources = array('orm', 'elastic');
        
        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
        $rootNode
            ->children()
                ->scalarNode('source')
                    ->validate()
                        ->ifNotInArray($supportedSources)
                        ->thenInvalid('The source %s is not supported. Please choose one of '.json_encode($supportedSources))
                    ->end()
                    ->cannotBeOverwritten()
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
            ->end()
            
            ->children()
                ->arrayNode('orm')
                    ->children()
                        ->scalarNode("table")
                            ->isRequired()
                            ->cannotBeEmpty()
                            ->end()
                        ->scalarNode("search_field")
                            ->isRequired()
                            ->cannotBeEmpty()
                            ->end()
        ;
        

        return $treeBuilder;
    }
}
