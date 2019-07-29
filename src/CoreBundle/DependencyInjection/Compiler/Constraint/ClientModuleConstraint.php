<?php declare(strict_types = 1);

namespace Symker\CoreBundle\DependencyInjection\Compiler\Constraint;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symker\CoreBundle\Module\Client\AllowedInClientModuleInterface;

class ClientModuleConstraint extends AbstractModuleConstraintConstraintPass
{
    protected const TARGET_MODULE = 'Client';
    protected const ALLOWED_INTERFACE = AllowedInClientModuleInterface::class;

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
