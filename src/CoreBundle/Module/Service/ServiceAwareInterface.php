<?php

namespace Symker\CoreBundle\Module\Service;

interface ServiceAwareInterface
{
    public function setService(AbstractService $service): void;
}
