<?php

namespace Symker\CoreBundle\Module\Client;

interface ClientDependencyProviderAwareInterface
{
    /**
     * @param \Symker\CoreBundle\Module\Client\ClientDependencyProvider $provider
     *
     * @return void
     */
    public function setDependencyProvider(ClientDependencyProvider $provider): void;
}
