<?php

namespace Symker\CoreBundle\Module\Back\Persistence;

use Symker\CoreBundle\Module\Back\Persistence\Exception\RepositoryNotFoundException;

trait RepositoryAwareTrait
{
    private $repository;

    /**
     * @param \Symker\CoreBundle\Module\Back\Persistence\AbstractRepository $repository
     *
     * @return void
     */
    public function setRepository(AbstractRepository $repository): void
    {
        $this->repository = $repository;
    }

    protected function getRepository(): AbstractRepository
    {
        if ($this->repository === null) {
            throw new RepositoryNotFoundException(__CLASS__);
        }

        return $this->repository;
    }
}
