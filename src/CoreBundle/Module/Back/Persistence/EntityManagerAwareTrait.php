<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Back\Persistence;

use Symker\CoreBundle\Module\Back\Persistence\Exception\EntityManagerNotFoundException;

/**
 * @see \Symker\CoreBundle\Module\Back\Persistence\EntityManagerAwareInterface
 */
trait EntityManagerAwareTrait
{
    /**
     * @var \Symker\CoreBundle\Module\Back\Persistence\EntityManagerInterface|null
     */
    private $entityManager;

    /**
     * @param \Symker\CoreBundle\Module\Back\Persistence\EntityManagerInterface $entityManager
     *
     * @return void
     */
    public function setEntityManager(EntityManagerInterface $entityManager): void
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @throws \Symker\CoreBundle\Module\Back\Persistence\Exception\EntityManagerNotFoundException
     *
     * @return \Symker\CoreBundle\Module\Back\Persistence\EntityManagerInterface
     */
    protected function getEntityManager(): EntityManagerInterface
    {
        if ($this->entityManager === null) {
            throw new EntityManagerNotFoundException('Entity Manager not found in ' . static::class);
        }

        return $this->entityManager;
    }
}
