<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Back\Communication\Controller;

use Symker\CoreBundle\Module\Back\Business\FacadeAwareInterface;
use Symker\CoreBundle\Module\Back\Persistence\PersistenceAwareInterface;

interface AbstractControllerInterface extends FacadeAwareInterface, PersistenceAwareInterface
{
}
