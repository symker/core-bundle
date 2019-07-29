<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Back\Persistence;

use Symker\CoreBundle\Module\Back\Communication\AllowedInCommunicationLayerInterface;

interface RepositoryInterface extends
    EntityManagerAwareInterface,
    AllowedInPersistenceLayerInterface,
    AllowedInCommunicationLayerInterface
{
}
