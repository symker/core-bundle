<?php declare(strict_types = 1);

namespace Symker\CoreBundle\DependencyInjection\Compiler\Aware;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symker\CoreBundle\DependencyInjection\Compiler\AbstractCompilerPass;
use Symker\CoreBundle\DependencyInjection\Compiler\Tag\SymkerBundleTagPass;
use Symker\CoreBundle\DependencyInjection\Compiler\Tag\SymkerClassTagPass;

abstract class AbstractAwarePass extends AbstractCompilerPass
{
    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     * @param string $awareClass
     * @param string $targetClass
     * @param string $methodCall
     *
     * @return void
     */
    protected function processAwareServices(
        ContainerBuilder $container,
        string $awareClass,
        string $targetClass,
        string $methodCall
    ): void {
        $services = $this->findSymkerServices($container);

        $map = $this->createBundleMapForClass($services, $targetClass);

        foreach ($services as $id => $tags) {
            $tag = $this->getSymkerTagProperties($tags);
            if ($tag === null) {
                continue;
            }

            $bundle = $tag[SymkerBundleTagPass::TAG_BUNDLE];
            if (isset($map[$bundle]) === false) {
                continue;
            }

            if ($this->implementsInterface($container, $id, $awareClass) === false) {
                continue;
            }

            $container->getDefinition($id)->addMethodCall($methodCall, [new Reference($map[$bundle])]);
        }
    }

    /**
     * @param array $services
     * @param string $class
     *
     * @return array
     */
    protected function createBundleMapForClass(array $services, string $class): array
    {
        $map = [];
        foreach ($services as $id => $tags) {
            $tag = $this->getSymkerTagProperties($tags);
            if ($tag === null) {
                continue;
            }

            if ($this->isTagOfClass($tag, $class)) {
                $map[$tag[SymkerBundleTagPass::TAG_BUNDLE]] = $id;
            }
        }

        return $map;
    }

    /**
     * @param array $tag
     * @param string $class
     *
     * @return bool
     */
    protected function isTagOfClass(array $tag, string $class): bool
    {
        return isset($tag[SymkerClassTagPass::TAG_CLASS]) && $tag[SymkerClassTagPass::TAG_CLASS] === $class;
    }
}
