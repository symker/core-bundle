<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Back\Business;

use Symker\CoreBundle\Module\Back\Communication\AllowedInCommunicationLayerInterface;
use Symker\CoreBundle\Module\Back\Persistence\PersistenceAwareInterface;
use Symker\CoreBundle\Module\Shared\ModuleDelegatorInterface;

interface FacadeInterfaceModule extends
    PersistenceAwareInterface,
    ModuleDelegatorInterface,
    AllowedInCommunicationLayerInterface,
    AllowedInBusinessModuleInterface
{
}
