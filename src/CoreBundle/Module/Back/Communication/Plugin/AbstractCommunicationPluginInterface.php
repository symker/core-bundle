<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Back\Communication\Plugin;

use Symker\CoreBundle\Module\Back\Business\FacadeAwareInterface;
use Symker\CoreBundle\Module\Back\Communication\AllowedInCommunicationLayerInterface;
use Symker\CoreBundle\Module\Back\Persistence\PersistenceAwareInterface;

interface AbstractCommunicationPluginInterface extends
    FacadeAwareInterface,
    PersistenceAwareInterface,
    AllowedInCommunicationLayerInterface
{
}
