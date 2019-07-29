<?php declare(strict_types = 1);

namespace Symker\CoreBundle\DependencyInjection\Compiler\Aware;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symker\CoreBundle\Module\Service\ServiceAwareInterface;
use Symker\CoreBundle\Module\Service\ServiceInterface;

class ServiceAwarePass extends AbstractAwarePass
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
            ServiceAwareInterface::class,
            ServiceInterface::class,
            'setService'
        );
    }
}
