<?php

namespace Symker\CoreBundle\Module\Back\Persistence;

trait PersistenceAwareTrait
{
    use RepositoryAwareTrait;
    use EntityManagerAwareTrait;
}
