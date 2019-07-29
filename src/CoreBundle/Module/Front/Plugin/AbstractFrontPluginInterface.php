<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Front\Plugin;

use Symker\CoreBundle\Module\Client\ClientAwareInterface;
use Symker\CoreBundle\Module\Front\AllowedInFrontModuleInterface;
use Symker\CoreBundle\Module\Service\ServiceAwareInterface;

interface AbstractFrontPluginInterface extends
    ClientAwareInterface,
    ServiceAwareInterface,
    AllowedInFrontModuleInterface
{
}
