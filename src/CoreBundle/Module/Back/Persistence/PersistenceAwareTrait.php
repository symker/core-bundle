<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Back\Persistence;

/**
 * @see \Symker\CoreBundle\Module\Back\Persistence\PersistenceAwareInterface
 */
trait PersistenceAwareTrait
{
    use RepositoryAwareTrait;
    use EntityManagerAwareTrait;
}
