<?php

namespace Symker\CoreBundle\Module\Service;

interface ServiceDependencyProviderAwareInterface
{
    public function setDependencyProvider(ServiceDependencyProvider $dependencyProvider): void;
}
