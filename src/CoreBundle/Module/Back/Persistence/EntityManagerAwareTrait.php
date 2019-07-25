<?php

namespace Symker\CoreBundle\Module\Back\Persistence;

use Symker\CoreBundle\Module\Back\Persistence\Exception\EntityManagerNotFoundException;

trait EntityManagerAwareTrait
{
    private $entityManager;

    public function setEntityManager(AbstractEntityManager $entityManager): void
    {
        $this->entityManager = $entityManager;
    }

    protected function getEntityManager(): AbstractEntityManager
    {
        if ($this->entityManager === null) {
            throw new EntityManagerNotFoundException(__CLASS__);
        }

        return $this->entityManager;
    }
}
