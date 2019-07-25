<?php

namespace Symker\CoreBundle\Module\Back\Persistence;

abstract class AbstractRepository implements PersistenceDependencyProviderAwareInterface
{
    use PersistenceDependencyProviderAwareTrait;
}
