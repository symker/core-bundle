<?php declare(strict_types = 1);

namespace Symker\CoreBundle\DependencyInjection\Compiler\Tag;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symker\CoreBundle\Module\Back\Business\FacadeInterfaceModule;
use Symker\CoreBundle\Module\Client\ClientInterfaceModule;
use Symker\CoreBundle\Module\Service\ServiceInterface;

class SymkerClassTagPass extends AbstractTagPass
{
    public const TAG_CLASS = 'class';

    public const MAP = [
        ClientInterfaceModule::class,
        ServiceInterface::class,
        FacadeInterfaceModule::class,
    ];

    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function process(ContainerBuilder $container): void
    {
        foreach ($this->findSymkerServices($container) as $id => $tags) {
            $this->processServiceId($container, $id);
        }
    }

    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     * @param string $id
     *
     * @return void
     */
    protected function processServiceId(ContainerBuilder $container, string $id): void
    {
        try {
            $reflectionClass = $container->getReflectionClass($id);
        } catch (\ReflectionException $e) {
            return;
        }

        if ($reflectionClass === null) {
            return;
        }

        foreach (static::MAP as $class) {
            if ($reflectionClass->isSubclassOf($class)) {
                $this->addProperty($container->getDefinition($id), static::TAG_CLASS, $class);

                return;
            }
        }
    }
}
