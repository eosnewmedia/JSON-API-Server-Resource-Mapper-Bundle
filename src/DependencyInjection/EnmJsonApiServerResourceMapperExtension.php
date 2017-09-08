<?php
declare(strict_types=1);

namespace Enm\Bundle\JsonApi\Server\ResourceMappers\DependencyInjection;

use Enm\JsonApi\Server\ResourceMappers\Mapper\ResourceMapperRegistry;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Extension\Extension;

/**
 * @author Philipp Marien <marien@eosnewmedia.de>
 */
class EnmJsonApiServerResourceMapperExtension extends Extension
{
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
            self::REGISTRY_SERVICE,
            new Definition(ResourceMapperRegistry::class)
        );
    }
}
