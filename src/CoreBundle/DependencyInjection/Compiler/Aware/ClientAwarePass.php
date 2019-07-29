<?php declare(strict_types = 1);

namespace Symker\CoreBundle\DependencyInjection\Compiler\Aware;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symker\CoreBundle\Module\Client\ClientAwareInterface;
use Symker\CoreBundle\Module\Client\ClientInterfaceModule;

class ClientAwarePass extends AbstractAwarePass
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
            ClientAwareInterface::class,
            ClientInterfaceModule::class,
            'setClient'
        );
    }
}
