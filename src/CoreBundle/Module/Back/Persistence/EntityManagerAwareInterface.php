<?php

namespace Symker\CoreBundle\Module\Back\Persistence;

interface EntityManagerAwareInterface
{
    public function setEntityManager(AbstractEntityManager $entityManager): void;
}
