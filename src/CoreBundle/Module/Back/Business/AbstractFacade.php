<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Back\Business;

use Symker\CoreBundle\Module\Back\Persistence\PersistenceAwareTrait;

abstract class AbstractFacade implements FacadeInterfaceModule
{
    use PersistenceAwareTrait;
}
