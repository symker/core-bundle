<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Service;

interface ServiceAwareInterface
{
    /**
     * @param \Symker\CoreBundle\Module\Service\ServiceInterface $service
     *
     * @return void
     */
    public function setService(ServiceInterface $service): void;
}
