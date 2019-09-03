<?php declare(strict_types = 1);

namespace Symker\CoreBundle\DependencyInjection\Compiler\Constraint;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symker\CoreBundle\DependencyInjection\Compiler\AbstractCompilerPass;
use Symker\CoreBundle\DependencyInjection\SymkerCompilerException;
use Symker\CoreBundle\Module\Shared\ModuleDelegatorInterface;

/**
 * Some special classes should have only inner-module dependencies
 */
class DelegatorConstraintPass extends AbstractCompilerPass
{
    public const INTERFACE = ModuleDelegatorInterface::class;

    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     *
     * @return void
     */
    public function process(ContainerBuilder $container): void
    {
        foreach ($this->findSymkerServices($container) as $id => $tags) {
            $this->processService($container, $id, $tags);
        }
    }

    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     * @param string $id
     * @param array $tags
     *
     * @return void
     */
    protected function processService(ContainerBuilder $container, string $id, array $tags): void
    {
        $tag = $this->getSymkerTagProperties($tags);
        if ($tag === null) {
            return;
        }

        if ($this->implementsInterface($container, $id, static::INTERFACE) === false) {
            return;
        }

        $bundle = $tag['bundle'];
        $module = $tag['module'];

        $error = static function (string $message, $argument) use ($id, $bundle, $module) {
            throw new SymkerCompilerException(
                "Service '{$id}' should only inject services from '{$bundle}/{$module}'. Got '{$argument}'. " . $message
            );
        };

        $definition = $container->getDefinition($id);
        foreach ($definition->getArguments() as $argument) {
            if (!($argument instanceof Reference)) {
                $error('Parameter injection is forbidden', $argument);
            }

            $argumentDefinition = $container->getDefinition((string)$argument);

            $argumentSymkerTags = $argumentDefinition->getTag('symker');
            if (empty($argumentSymkerTags)) {
                $error('Non-Symker Dependencies are forbidden.', (string)$argument);
            }

            $argumentSymkerTag = $argumentSymkerTags[0];
            $argumentBundle = $argumentSymkerTag['bundle'];
            $argumentModule = $argumentSymkerTag['module'];
            if ($bundle !== $argumentBundle) {
                $error('Can use only services in the same bundle.', (string)$argument);
            }

            if ($module !== $argumentModule) {
                $error('Can use only services in the same module.', (string)$argument);
            }
        }
    }
}
