<?php

namespace Symker\CoreBundle\Module\Client;

use Symker\CoreBundle\Module\Client\Exception\ClientDependencyProviderNotFoundException;

trait ClientDependencyProviderAwareTrait
{
    /**
     * @var \Symker\CoreBundle\Module\Client\ClientDependencyProvider|null
     */
    private $provider;

    /**
     * @param \Symker\CoreBundle\Module\Client\ClientDependencyProvider $provider
     *
     * @return void
     */
    public function setDependencyProvider(ClientDependencyProvider $provider): void
    {
        $this->provider = $provider;
    }

    /**
     * @throws \Symker\CoreBundle\Module\Client\Exception\ClientDependencyProviderNotFoundException
     *
     * @return \Symker\CoreBundle\Module\Client\ClientDependencyProvider
     */
    protected function getDependencyProvider(): ClientDependencyProvider
    {
        if ($this->provider === null) {
            throw new ClientDependencyProviderNotFoundException(__CLASS__);
        }

        return $this->provider;
    }
}
