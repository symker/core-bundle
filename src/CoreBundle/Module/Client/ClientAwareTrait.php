<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Client;

use Symker\CoreBundle\Module\Client\Exception\ClientNotFoundException;

/**
 * @see \Symker\CoreBundle\Module\Client\ClientAwareInterface
 */
trait ClientAwareTrait
{
    /**
     * @var \Symker\CoreBundle\Module\Client\ClientInterfaceModule|null
     */
    private $client;

    /**
     * @param \Symker\CoreBundle\Module\Client\ClientInterfaceModule $client
     *
     * @return void
     */
    public function setClient(ClientInterfaceModule $client): void
    {
        $this->client = $client;
    }

    /**
     * @throws \Symker\CoreBundle\Module\Client\Exception\ClientNotFoundException
     *
     * @return \Symker\CoreBundle\Module\Client\ClientInterfaceModule
     */
    protected function getClient(): ClientInterfaceModule
    {
        if ($this->client === null) {
            throw new ClientNotFoundException('Client not found in ' . static::class);
        }

        return $this->client;
    }
}
