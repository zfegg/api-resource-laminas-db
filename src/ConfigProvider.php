<?php


namespace Zfegg\ApiResourceLaminasDb;

use Mezzio\Application;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class ConfigProvider
{

    public function __invoke()
    {
        return [
            'dependencies'       => [
                'abstract_factories' => [
                    Factory\DbResourceAbstractFactory::class,
                ],
                'factories' => [
                    Extension\ExtensionsFactory::class => Factory\ExtensionsFactoryFactory::class,
                ],
            ],
        ];
    }
}
