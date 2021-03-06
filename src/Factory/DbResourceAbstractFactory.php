<?php


namespace Zfegg\ApiResourceLaminasDb\Factory;


use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\AbstractFactoryInterface;
use Zfegg\ApiResourceLaminasDb\Extension\ExtensionsFactory;
use Zfegg\ApiResourceLaminasDb\Resource\DbResource;

class DbResourceAbstractFactory implements AbstractFactoryInterface
{

    public function canCreate(ContainerInterface $container, $requestedName)
    {
        return isset($container->get('config')['db-resources'][$requestedName]);
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('config')['db-resources'][$requestedName];
        $table = $container->get($config['table']);
        unset($config['table']);

        $extensions = $container->get(ExtensionsFactory::class)->create($config);

        return new DbResource($table, $extensions);
    }
}
