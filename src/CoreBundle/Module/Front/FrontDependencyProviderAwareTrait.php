<?php

namespace Symker\CoreBundle\Module\Front;

use Symker\CoreBundle\Module\Front\Exception\FrontDependencyProviderNotFoundException;

trait FrontDependencyProviderAwareTrait
{
    private $provider;

    /**
     * @param \Symker\CoreBundle\Module\Front\FrontDependencyProvider $provider
     *
     * @return void
     */
    public function setDependencyProvider(FrontDependencyProvider $provider): void
    {
        $this->provider = $provider;
    }

    protected function getDependencyProvider(): FrontDependencyProvider
    {
        if ($this->provider === null) {
            throw new FrontDependencyProviderNotFoundException(__CLASS__);
        }

        return $this->provider;
    }
}
