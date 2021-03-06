<?php

namespace SimpleThings\EntityAudit\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $builder = new TreeBuilder();
        $builder->root('simple_things_entity_audit')
            ->children()
                ->scalarNode('entity_manager')->defaultValue('default')->end()
                ->scalarNode('table_prefix')->defaultValue('')->end()
                ->scalarNode('table_suffix')->defaultValue('_audit')->end()
                ->scalarNode('revision_field_name')->defaultValue('rev')->end()
                ->scalarNode('revision_type_field_name')->defaultValue('revtype')->end()
                ->scalarNode('revision_table_name')->defaultValue('revisions')->end()
                ->scalarNode('revision_id_field_type')->defaultValue('integer')->end()
                ->arrayNode('service')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('username_callable')->defaultValue('simplethings_entityaudit.username_callable.token_storage')->end()
                    ->end()
                ->end()
                ->arrayNode('comparators')
                    ->prototype('scalar')->end()
                    ->defaultValue(array())
                ->end()
                ->arrayNode('global_ignores')
                    ->prototype('scalar')->end()
                    ->defaultValue(array())
                ->end()
                ->arrayNode('audited_entities')
                    ->canBeUnset()
                    ->prototype('array')
                    ->children()
                        ->arrayNode('ignored_columns')
                            ->canBeUnset()
                            ->prototype('scalar')->end()
                        ->end()
                        ->booleanNode('enabled')
                            ->defaultTrue()
                        ->end()
                    ->end()
                ->end()
        ;

        return $builder;
    }
}
