<?php declare(strict_types = 1);

namespace Symker\CoreBundle\DependencyInjection\Compiler;

use ReflectionException;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symker\CoreBundle\DependencyInjection\Compiler\Tag\SymkerTagPass;

abstract class AbstractCompilerPass implements CompilerPassInterface
{
    public const TAG_ID = 'symker';

    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     *
     * @return array
     */
    protected function findSymkerServices(ContainerBuilder $container): array
    {
        return $container->findTaggedServiceIds(static::TAG_ID);
    }

    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     * @param string $id
     * @param string $interface
     *
     * @return bool
     */
    protected function implementsInterface(ContainerBuilder $container, string $id, string $interface): bool
    {
        try {
            $reflectionClass = $container->getReflectionClass($id);
        } catch (ReflectionException $e) {
            return false;
        }

        if ($reflectionClass === null) {
            return false;
        }

        return $reflectionClass->implementsInterface($interface);
    }

    /**
     * @param array $tags
     *
     * @return array|null
     */
    protected function getSymkerTagProperties(array $tags): ?array
    {
        foreach ($tags as $tag) {
            if (isset($tag[SymkerTagPass::TAG_NAME])
                && $tag[SymkerTagPass::TAG_NAME] === static::TAG_ID
            ) {
                return $tag;
            }
        }

        return null;
    }
}
