<?php

namespace Symker\CoreBundle\Module\Back\Persistence;

use Symker\CoreBundle\Module\Back\Persistence\Exception\PersistenceDependencyProviderNotFoundException;

trait PersistenceDependencyProviderAwareTrait
{
    private $provider;

    /**
     * @param \Symker\CoreBundle\Module\Back\Persistence\PersistenceDependencyProvider $provider
     *
     * @return void
     */
    public function setDependencyProvider(PersistenceDependencyProvider $provider): void
    {
        $this->provider = $provider;
    }

    /**
     * @throws \Symker\CoreBundle\Module\Back\Persistence\Exception\PersistenceDependencyProviderNotFoundException
     *
     * @return \Symker\CoreBundle\Module\Back\Persistence\PersistenceDependencyProvider
     */
    protected function getDependencyProvider(): PersistenceDependencyProvider
    {
        if ($this->provider === null) {
            throw new PersistenceDependencyProviderNotFoundException(__CLASS__);
        }

        return $this->provider;
    }
}
