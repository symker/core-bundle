<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Back\Persistence;

interface RepositoryAwareInterface
{
    /**
     * @param \Symker\CoreBundle\Module\Back\Persistence\RepositoryInterface $repository
     *
     * @return void
     */
    public function setRepository(RepositoryInterface $repository): void;
}
