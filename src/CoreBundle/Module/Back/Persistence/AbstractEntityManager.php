<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Back\Persistence;

abstract class AbstractEntityManager implements EntityManagerInterface
{
    use RepositoryAwareTrait;
}
