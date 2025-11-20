<?php

declare(strict_types=1);

namespace Codefog\CloudflareTurnstileBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('cloudflare_turnstile');

        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('secret_key')
                    ->cannotBeEmpty()
                    ->defaultValue('')
                ->end()
                ->scalarNode('site_key')
                    ->cannotBeEmpty()
                    ->defaultValue('')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
