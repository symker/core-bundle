<?php declare(strict_types = 1);

namespace Symker\CoreBundle\DependencyInjection\Compiler\Aware;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symker\CoreBundle\Module\Back\Persistence\RepositoryAwareInterface;
use Symker\CoreBundle\Module\Back\Persistence\RepositoryInterface;

class RepositoryAwarePass extends AbstractAwarePass
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
            RepositoryAwareInterface::class,
            RepositoryInterface::class,
            'setRepository'
        );
    }
}
