<?php

namespace Symker\CoreBundle\Module\Client;

abstract class AbstractClient implements ClientDependencyProviderAwareInterface
{
    use ClientDependencyProviderAwareTrait;
}
