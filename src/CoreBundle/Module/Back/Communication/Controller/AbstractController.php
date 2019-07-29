<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Back\Communication\Controller;

use Symker\CoreBundle\Module\Back\Business\FacadeAwareTrait;
use Symker\CoreBundle\Module\Back\Persistence\PersistenceAwareTrait;

abstract class AbstractController implements AbstractControllerInterface
{
    use FacadeAwareTrait;
    use PersistenceAwareTrait;
}
