<?php

namespace Symker\CoreBundle\Module\Front\Plugin;

use Symker\CoreBundle\Module\AbstractPlugin;
use Symker\CoreBundle\Module\Client\ClientAwareInterface;
use Symker\CoreBundle\Module\Client\ClientAwareTrait;
use Symker\CoreBundle\Module\Front\FrontDependencyProviderAwareInterface;
use Symker\CoreBundle\Module\Front\FrontDependencyProviderAwareTrait;
use Symker\CoreBundle\Module\Service\ServiceAwareInterface;
use Symker\CoreBundle\Module\Service\ServiceAwareTrait;

abstract class AbstractFrontPlugin extends AbstractPlugin implements ClientAwareInterface, ServiceAwareInterface, FrontDependencyProviderAwareInterface
{
    use ClientAwareTrait;
    use ServiceAwareTrait;
    use FrontDependencyProviderAwareTrait;
}
