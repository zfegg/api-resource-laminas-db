<?php


namespace Zfegg\ApiResourceLaminasDb\Factory;


use Psr\Container\ContainerInterface;
use Zfegg\ApiResourceLaminasDb\Extension\ExtensionsFactory;
use Zfegg\ApiResourceLaminasDb\Extension\PaginationExtension;
use Zfegg\ApiResourceLaminasDb\Extension\QueryParserExtension;

class ExtensionsFactoryFactory
{
    public function __invoke(ContainerInterface $container): ExtensionsFactory
    {
        return new ExtensionsFactory(
            $container,
            [
                'abstract_factories' => [
                    ExtensionAbstractFactory::class,
                ],
                'aliases' =>  [
                    'pagination' => PaginationExtension::class,
                    'query_parser' => QueryParserExtension::class,
                ],
            ]
        );
    }
}
