<?php

namespace Symker\CoreBundle\Module\Back\Persistence;

interface PersistenceDependencyProviderAwareInterface
{
    /**
     * @param \Symker\CoreBundle\Module\Back\Persistence\PersistenceDependencyProvider $provider
     *
     * @return void
     */
    public function setDependencyProvider(PersistenceDependencyProvider $provider): void;
}
