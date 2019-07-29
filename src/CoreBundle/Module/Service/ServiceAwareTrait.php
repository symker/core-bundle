<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Service;

use Symker\CoreBundle\Module\Service\Exception\ServiceNotFoundException;

/**
 * @see \Symker\CoreBundle\Module\Service\ServiceAwareInterface
 */
trait ServiceAwareTrait
{
    /**
     * @var \Symker\CoreBundle\Module\Service\ServiceInterface|null
     */
    private $service;

    /**
     * @param \Symker\CoreBundle\Module\Service\ServiceInterface $service
     *
     * @return void
     */
    public function setService(ServiceInterface $service): void
    {
        $this->service = $service;
    }

    /**
     * @throws \Symker\CoreBundle\Module\Service\Exception\ServiceNotFoundException
     *
     * @return \Symker\CoreBundle\Module\Service\ServiceInterface
     */
    protected function getService(): ServiceInterface
    {
        if ($this->service === null) {
            throw new ServiceNotFoundException('Service not found in ' . static::class);
        }

        return $this->service;
    }
}
