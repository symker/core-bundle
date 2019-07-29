<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Back\Persistence;

use Symker\CoreBundle\Module\Back\Persistence\Exception\RepositoryNotFoundException;

/**
 * @see \Symker\CoreBundle\Module\Back\Persistence\RepositoryAwareInterface
 */
trait RepositoryAwareTrait
{
    /**
     * @var \Symker\CoreBundle\Module\Back\Persistence\RepositoryInterface|null
     */
    private $repository;

    /**
     * @param \Symker\CoreBundle\Module\Back\Persistence\RepositoryInterface $repository
     *
     * @return void
     */
    public function setRepository(RepositoryInterface $repository): void
    {
        $this->repository = $repository;
    }

    /**
     * @throws \Symker\CoreBundle\Module\Back\Persistence\Exception\RepositoryNotFoundException
     *
     * @return \Symker\CoreBundle\Module\Back\Persistence\RepositoryInterface
     */
    protected function getRepository(): RepositoryInterface
    {
        if ($this->repository === null) {
            throw new RepositoryNotFoundException('Repository not found in ' . static::class);
        }

        return $this->repository;
    }
}
