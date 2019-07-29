<?php declare(strict_types = 1);

namespace Symker\CoreBundle\DependencyInjection\Compiler\Aware;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symker\CoreBundle\Module\Back\Business\FacadeAwareInterface;
use Symker\CoreBundle\Module\Back\Business\FacadeInterfaceModule;

class FacadeAwarePass extends AbstractAwarePass
{
    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     *
     * @return void
     */
    public function process(ContainerBuilder $container): void
    {
        $this->processAwareServices(
            $container,
            FacadeAwareInterface::class,
            FacadeInterfaceModule::class,
            'setFacade'
        );
    }
}
