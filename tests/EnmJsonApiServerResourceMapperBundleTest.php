<?php
declare(strict_types=1);

namespace Enm\Bundle\JsonApi\Server\ResourceMappers\Tests;

use Enm\Bundle\JsonApi\Server\ResourceMappers\DependencyInjection\Compiler\ResourceMapperPass;
use Enm\Bundle\JsonApi\Server\ResourceMappers\DependencyInjection\EnmJsonApiServerResourceMapperExtension;
use Enm\Bundle\JsonApi\Server\ResourceMappers\EnmJsonApiServerResourceMapperBundle;
use Enm\JsonApi\Server\ResourceMappers\Mapper\ResourceMapperInterface;
use Enm\JsonApi\Server\ResourceMappers\Mapper\ResourceMapperRegistry;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

/**
 * @author Philipp Marien <marien@eosnewmedia.de>
 */
class EnmJsonApiServerResourceMapperBundleTest extends TestCase
{
    public function testServices()
    {
        $container = new ContainerBuilder();
        $container->setDefinition(
            ResourceMapperRegistry::class,
            (new Definition(ResourceMapperRegistry::class))->addTag('json_api_server.resource_mapper')
        );

        (new EnmJsonApiServerResourceMapperBundle())->build($container);
        (new EnmJsonApiServerResourceMapperExtension())->load([], $container);

        $container->compile();

        self::assertCount(
            1,
            $container->getDefinition(EnmJsonApiServerResourceMapperExtension::REGISTRY_SERVICE)->getMethodCalls()
        );
        self::assertCount(1, $container->findTaggedServiceIds(ResourceMapperPass::RESOURCE_MAPPER_TAG));
        self::assertInstanceOf(ResourceMapperInterface::class, $container->get('enm.json_api_server.resource_mappers'));
    }
}
