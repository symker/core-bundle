<?php declare(strict_types = 1);

namespace Symker\CoreBundle\DependencyInjection\Compiler\Constraint;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symker\CoreBundle\Module\Service\AllowedInServiceModuleInterface;

class ServiceModuleConstraint extends AbstractModuleConstraintConstraintPass
{
    protected const TARGET_MODULE = 'Service';
    protected const ALLOWED_INTERFACE = AllowedInServiceModuleInterface::class;

    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     *
     * @throws \Symker\CoreBundle\DependencyInjection\SymkerCompilerException
     *
     * @return void
     */
    public function process(ContainerBuilder $container): void
    {
        $this->processModuleConstraint(
            $container,
            static::TARGET_MODULE,
            static::ALLOWED_INTERFACE
        );
    }
}
