<?php

namespace Symker\CoreBundle\Module\Service;

use Symker\CoreBundle\Module\Service\Exception\ServiceNotFoundException;

/**
 * @internal
 */
trait ServiceAwareTrait
{
    private $service;

    protected function getService(): AbstractService
    {
        if ($this->service === null) {
            throw new ServiceNotFoundException(__CLASS__);
        }

        return $this->service;
    }

    public function setService(AbstractService $service): void
    {
        $this->service = $service;
    }
}
