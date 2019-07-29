<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Client;

interface ClientAwareInterface
{
    /**
     * @param \Symker\CoreBundle\Module\Client\ClientInterfaceModule $client
     *
     * @return void
     */
    public function setClient(ClientInterfaceModule $client): void;
}
