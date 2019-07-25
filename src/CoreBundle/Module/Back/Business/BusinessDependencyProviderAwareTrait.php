<?php

namespace Symker\CoreBundle\Module\Back\Business;

use Symker\CoreBundle\Module\Back\Business\Exception\BusinessDependencyProviderNotFoundException;

trait BusinessDependencyProviderAwareTrait
{
    private $provider;

    /**
     * @param \Symker\CoreBundle\Module\Back\Business\BusinessDependencyProvider $provider
     *
     * @return void
     */
    public function setDependencyProvider(BusinessDependencyProvider $provider): void
    {
        $this->provider = $provider;
    }

    protected function getDependencyProvider(): BusinessDependencyProvider
    {
        if ($this->provider === null) {
            throw new BusinessDependencyProviderNotFoundException(__CLASS__);
        }

        return $this->provider;
    }
}
