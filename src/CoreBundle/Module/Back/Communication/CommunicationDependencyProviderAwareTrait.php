<?php

namespace Symker\CoreBundle\Module\Back\Communication;

use Symker\CoreBundle\Module\Back\Communication\Exception\CommunicationDependencyProviderNotFoundException;

trait CommunicationDependencyProviderAwareTrait
{
    private $provider;

    /**
     * @param \Symker\CoreBundle\Module\Back\Communication\CommunicationDependencyProvider $provider
     *
     * @return void
     */
    public function setDependencyProvider(CommunicationDependencyProvider $provider): void
    {
        $this->provider = $provider;
    }

    protected function getDependencyProvider(): CommunicationDependencyProvider
    {
        if ($this->provider === null) {
            throw new CommunicationDependencyProviderNotFoundException(__CLASS__);
        }

        return $this->provider;
    }
}
