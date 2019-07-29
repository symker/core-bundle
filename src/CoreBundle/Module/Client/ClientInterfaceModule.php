<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Client;

use Symker\CoreBundle\Module\Back\Business\AllowedInBusinessModuleInterface;
use Symker\CoreBundle\Module\Front\AllowedInFrontModuleInterface;
use Symker\CoreBundle\Module\Service\ServiceAwareInterface;
use Symker\CoreBundle\Module\Shared\ModuleDelegatorInterface;

interface ClientInterfaceModule extends
    ServiceAwareInterface,
    ModuleDelegatorInterface,
    AllowedInClientModuleInterface,
    AllowedInFrontModuleInterface,
    AllowedInBusinessModuleInterface
{
}
