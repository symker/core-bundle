<?php

namespace Symker\CoreBundle\Module\Client;

interface ClientAwareInterface
{
    /**
     * @param \Symker\CoreBundle\Module\Client\AbstractClient $client
     *
     * @return void
     */
    public function setClient(AbstractClient $client): void;
}
