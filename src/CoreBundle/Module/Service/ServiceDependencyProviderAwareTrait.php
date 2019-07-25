<?php

namespace Symker\CoreBundle\Module\Service;

use Symker\CoreBundle\Module\Service\Exception\ServiceDependencyProviderNotFoundException;

trait ServiceDependencyProviderAwareTrait
{
    private $provider;

    public function setDependencyProvider(ServiceDependencyProvider $provider): void
    {
        $this->provider = $provider;
    }

    protected function getDependencyProvider(): ServiceDependencyProvider
    {
        if ($this->provider === null) {
            throw new ServiceDependencyProviderNotFoundException(__CLASS__);
        }

        return $this->provider;
    }
}
