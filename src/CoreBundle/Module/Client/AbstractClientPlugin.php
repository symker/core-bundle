<?php

namespace Symker\CoreBundle\Module\Client;

use Symker\CoreBundle\Module\AbstractPlugin;

abstract class AbstractClientPlugin extends AbstractPlugin implements ClientAwareInterface, ClientDependencyProviderAwareInterface
{
    use ClientAwareTrait;
    use ClientDependencyProviderAwareTrait;
}
