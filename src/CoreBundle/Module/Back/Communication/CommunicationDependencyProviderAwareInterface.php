<?php

namespace Symker\CoreBundle\Module\Back\Communication;

interface CommunicationDependencyProviderAwareInterface
{
    /**
     * @param \Symker\CoreBundle\Module\Back\Communication\CommunicationDependencyProvider $provider
     *
     * @return void
     */
    public function setDependencyProvider(CommunicationDependencyProvider $provider): void;
}
