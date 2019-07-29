<?php declare(strict_types = 1);

namespace Symker\CoreBundle\DependencyInjection\Compiler\Aware;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symker\CoreBundle\Module\Back\Persistence\EntityManagerAwareInterface;
use Symker\CoreBundle\Module\Back\Persistence\EntityManagerInterface;

class EntityManagerAwarePass extends AbstractAwarePass
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
            EntityManagerAwareInterface::class,
            EntityManagerInterface::class,
            'setEntityManager'
        );
    }
}
