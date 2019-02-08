<?php

namespace Fnash\JsParamBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $treeBuilder->root('fnash_js_param')
                ->children()
                    ->arrayNode('expose')
                        ->prototype('variable')->end()
                    ->end()
                ->end();

        return $treeBuilder;
    }
}
