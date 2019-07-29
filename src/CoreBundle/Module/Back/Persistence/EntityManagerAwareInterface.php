<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Back\Persistence;

interface EntityManagerAwareInterface
{
    /**
     * @param \Symker\CoreBundle\Module\Back\Persistence\EntityManagerInterface $entityManager
     *
     * @return void
     */
    public function setEntityManager(EntityManagerInterface $entityManager): void;
}
