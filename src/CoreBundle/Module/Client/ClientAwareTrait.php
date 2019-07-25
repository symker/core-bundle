<?php

namespace Symker\CoreBundle\Module\Client;

use Symker\CoreBundle\Module\Client\Exception\ClientNotFoundException;

/**
 * @internal
 */
trait ClientAwareTrait
{
    private $client;

    protected function getClient(): AbstractClient
    {
        if ($this->client === null) {
            throw new ClientNotFoundException(__CLASS__);
        }

        return $this->client;
    }

    public function setClient(AbstractClient $client): void
    {
        $this->client = $client;
    }
}
