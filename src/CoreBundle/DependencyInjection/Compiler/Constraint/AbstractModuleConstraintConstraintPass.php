<?php declare(strict_types = 1);

namespace Symker\CoreBundle\DependencyInjection\Compiler\Constraint;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symker\CoreBundle\DependencyInjection\Compiler\AbstractCompilerPass;
use Symker\CoreBundle\DependencyInjection\SymkerCompilerException;

abstract class AbstractModuleConstraintConstraintPass extends AbstractCompilerPass
{
    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     * @param string $targetModule
     * @param string $allowedInterface
     *
     * @throws \Symker\CoreBundle\DependencyInjection\SymkerCompilerException
     *
     * @return void
     */
    protected function processModuleConstraint(
        ContainerBuilder $container,
        string $targetModule,
        string $allowedInterface
    ): void {
        foreach ($this->findSymkerServices($container) as $id => $tags) {
            $tag = $this->getSymkerTagProperties($tags);

            if ($tag === null) {
                return;
            }

            $bundle = $tag['bundle'];
            $module = $tag['module'];
            if ($module !== $targetModule) {
                continue;
            }

            $definition = $container->getDefinition($id);

            foreach ($definition->getArguments() as $argument) {
                if (!($argument instanceof Reference)) {
                    continue;
                }

                if ($this->isServiceForbidden($container, (string)$argument, $module, $bundle, $allowedInterface)) {
                    throw new SymkerCompilerException(
                        "Bad service dependencies in '{$targetModule}' module. "
                        . "Got '{$argument}' in service '{$id}'."
                    );
                }
            }

            foreach ($definition->getMethodCalls() as $methodCall) {
                [$name, $methodCallArguments] = $methodCall;

                foreach ($methodCallArguments as $methodCallArgument) {
                    if (!($methodCallArgument instanceof Reference)) {
                        continue;
                    }

                    if ($this->isServiceForbidden(
                        $container,
                        (string)$methodCallArgument,
                        $module,
                        $bundle,
                        $allowedInterface
                    )) {
                        throw new SymkerCompilerException(
                            "Bad service dependencies in '{$targetModule}' module. "
                            . "Got '{$methodCallArgument}' for method '{$name}' in service '{$id}'."
                        );
                    }
                }
            }
        }
    }

    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     * @param string $serviceId
     * @param string $targetModule
     * @param string $targetBundle
     * @param string $allowedInterface
     *
     * @return bool
     */
    protected function isServiceForbidden(
        ContainerBuilder $container,
        string $serviceId,
        string $targetModule,
        string $targetBundle,
        string $allowedInterface
    ): bool {
        $argumentDefinition = $container->getDefinition($serviceId);

        $argumentTags = $argumentDefinition->getTag('symker');
        if (empty($argumentTags)) {
            return false;
        }

        $argumentTag = $argumentTags[0];
        $argumentModule = $argumentTag['module'];
        $argumentBundle = $argumentTag['bundle'];

        if ($targetBundle === $argumentBundle && $argumentModule === $targetModule) {
            return false;
        }

        return $this->implementsInterface($container, $serviceId, $allowedInterface) === false;
    }
}
