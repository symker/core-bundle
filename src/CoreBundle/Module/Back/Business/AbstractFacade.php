<?php

namespace Symker\CoreBundle\Module\Back\Business;

use Symker\CoreBundle\Module\Back\Persistence\PersistenceAwareInterface;
use Symker\CoreBundle\Module\Back\Persistence\PersistenceAwareTrait;

abstract class AbstractFacade implements PersistenceAwareInterface, BusinessDependencyProviderAwareInterface
{
    use PersistenceAwareTrait;
    use BusinessDependencyProviderAwareTrait;
}
