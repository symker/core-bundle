<?php

namespace Symker\CoreBundle\Module\Back\Persistence;

interface RepositoryAwareInterface
{
    public function setRepository(AbstractRepository $repository): void;
}
