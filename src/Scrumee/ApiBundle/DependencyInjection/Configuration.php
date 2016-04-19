<?php

namespace Scrumee\ApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('api');

        $rootNode
            ->children()
                ->arrayNode('guzzle_parameters')
                    ->append($this->addGuzzleParamtersNode())
                ->end()


                ->arrayNode('jira_parameters')
                    ->children()
                        ->scalarNode('base_url')->isRequired()->cannotBeEmpty()->end()
                        ->append($this->addJiraAuthParametersNode())
                        ->append($this->addJiraProjectsParametersNode())
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }

    /**
     * @return ArrayNodeDefinition|NodeDefinition
     */
    public function addGuzzleParamtersNode()
    {
        $builder = new TreeBuilder();
        $node = $builder->root('options');

        $node
            ->children()
                ->scalarNode('timeout')->defaultValue('4.0')->end()
                ->scalarNode('Accept')->defaultValue('application/json')->end()
                ->scalarNode('User-Agent')->defaultValue('scrumee_api/0.0.1')->end()
            ->end()
        ;

        return $node;
    }

    /**
     * @return ArrayNodeDefinition|NodeDefinition
     */
    public function addJiraAuthParametersNode()
    {
        $builder = new TreeBuilder();
        $node = $builder->root('auth');

        $node
            ->children()
                ->scalarNode('username')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('password')->isRequired()->cannotBeEmpty()->end()
            ->end()
        ;
        return $node;
    }

    /**
     * @return ArrayNodeDefinition|NodeDefinition
     */
    public function addJiraProjectsParametersNode()
    {
        $builder = new TreeBuilder();
        $node = $builder->root('projects');
        $node
            ->children()
                ->arrayNode('uuid')
                    ->prototype('scalar')->end()
                ->end()
            ->end()
        ;

        return $node;
    }
}
