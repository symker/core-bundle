<?php

namespace Symker\CoreBundle\Module\Back\Persistence;

abstract class AbstractEntityManager implements PersistenceDependencyProviderAwareInterface
{
    use PersistenceDependencyProviderAwareTrait;
}
