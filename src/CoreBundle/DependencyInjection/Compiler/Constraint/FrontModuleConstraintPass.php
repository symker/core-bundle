<?php declare(strict_types = 1);

namespace Symker\CoreBundle\DependencyInjection\Compiler\Constraint;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symker\CoreBundle\Module\Front\AllowedInFrontModuleInterface;

class FrontModuleConstraintPass extends AbstractModuleConstraintConstraintPass
{
    protected const TARGET_MODULE = 'Front';
    protected const ALLOWED_INTERFACE = AllowedInFrontModuleInterface::class;

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
