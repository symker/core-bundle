<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Back;

use Symker\CoreBundle\Module\Back\Business\AllowedInBusinessModuleInterface;
use Symker\CoreBundle\Module\Back\Communication\AllowedInCommunicationLayerInterface;
use Symker\CoreBundle\Module\Back\Persistence\AllowedInPersistenceLayerInterface;

interface AllowedInBackModuleInterface extends
    AllowedInBusinessModuleInterface,
    AllowedInCommunicationLayerInterface,
    AllowedInPersistenceLayerInterface
{
}
