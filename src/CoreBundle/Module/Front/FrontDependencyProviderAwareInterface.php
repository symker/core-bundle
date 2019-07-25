<?php

namespace Symker\CoreBundle\Module\Front;

interface FrontDependencyProviderAwareInterface
{
    /**
     * @param \Symker\CoreBundle\Module\Front\FrontDependencyProvider $provider
     *
     * @return void
     */
    public function setDependencyProvider(FrontDependencyProvider $provider): void;
}
