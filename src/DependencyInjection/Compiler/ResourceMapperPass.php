<?php
declare(strict_types=1);

namespace Enm\Bundle\JsonApi\Server\ResourceMappers\DependencyInjection\Compiler;

use Enm\JsonApi\Server\ResourceMappers\Mapper\ResourceMapperInterface;
use Enm\JsonApi\Server\ResourceMappers\Mapper\ResourceMapperRegistry;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @author Philipp Marien <marien@eosnewmedia.de>
 */
class ResourceMapperPass implements CompilerPassInterface
{
    const RESOURCE_MAPPER_TAG = 'json_api_server.resource_mapper';

    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     * @throws \Exception
     */
    public function process(ContainerBuilder $container)
    {
        if ($container->hasDefinition(ResourceMapperInterface::class)) {
            $registry = $container->getDefinition(ResourceMapperInterface::class);

            if ($registry->getClass() === ResourceMapperRegistry::class) {
                $mappers = $container->findTaggedServiceIds(self::RESOURCE_MAPPER_TAG);
                foreach ($mappers as $id => $tags) {
                    $registry->addMethodCall('addMapper', [new Reference($id)]);
                }
            }
        }
    }
}
