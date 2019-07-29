<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Service;

use Symker\CoreBundle\Module\Back\AllowedInBackModuleInterface;
use Symker\CoreBundle\Module\Client\AllowedInClientModuleInterface;
use Symker\CoreBundle\Module\Front\AllowedInFrontModuleInterface;
use Symker\CoreBundle\Module\Shared\ModuleDelegatorInterface;

interface ServiceInterface extends
    AllowedInServiceModuleInterface,
    AllowedInClientModuleInterface,
    AllowedInFrontModuleInterface,
    AllowedInBackModuleInterface,
    ModuleDelegatorInterface
{
}
