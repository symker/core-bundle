<?php

namespace Symker\CoreBundle\Module\Back\Business;

interface BusinessDependencyProviderAwareInterface
{
    public function setDependencyProvider(BusinessDependencyProvider $provider): void;
}
