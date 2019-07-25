<?php

namespace Symker\CoreBundle\Module\Back\Communication\Controller;

use Symker\CoreBundle\Module\Back\Business\FacadeAwareInterface;
use Symker\CoreBundle\Module\Back\Business\FacadeAwareTrait;
use Symker\CoreBundle\Module\Back\Communication\CommunicationDependencyProviderAwareInterface;
use Symker\CoreBundle\Module\Back\Communication\CommunicationDependencyProviderAwareTrait;
use Symker\CoreBundle\Module\Back\Persistence\PersistenceAwareInterface;
use Symker\CoreBundle\Module\Back\Persistence\PersistenceAwareTrait;

abstract class AbstractController implements FacadeAwareInterface, PersistenceAwareInterface, CommunicationDependencyProviderAwareInterface
{
    use FacadeAwareTrait;
    use PersistenceAwareTrait;
    use CommunicationDependencyProviderAwareTrait;
}
