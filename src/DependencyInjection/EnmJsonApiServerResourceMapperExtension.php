<?php
declare(strict_types=1);

namespace Enm\Bundle\JsonApi\Server\ResourceMappers\DependencyInjection;

use Enm\JsonApi\Server\ResourceMappers\Mapper\ResourceMapperInterface;
use Enm\JsonApi\Server\ResourceMappers\Mapper\ResourceMapperRegistry;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Extension\Extension;

/**
 * @author Philipp Marien <marien@eosnewmedia.de>
 */
class EnmJsonApiServerResourceMapperExtension extends Extension
{
    /**
     * @deprecated will be removed in 2.0
     */
    const REGISTRY_SERVICE = 'enm.json_api_server.resource_mappers';

    /**
     * Loads a specific configuration.
     *
     * @param array $configs An array of configuration values
     * @param ContainerBuilder $container A ContainerBuilder instance
     *
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $container->setDefinition(
            ResourceMapperInterface::class,
            new Definition(ResourceMapperRegistry::class)
        );

        $container->setAlias(self::REGISTRY_SERVICE, ResourceMapperInterface::class);
    }
}
