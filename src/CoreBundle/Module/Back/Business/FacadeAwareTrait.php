<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Back\Business;

use Symker\CoreBundle\Module\Back\Business\Exception\FacadeNotFoundException;

/**
 * @see \Symker\CoreBundle\Module\Back\Business\FacadeAwareInterface
 */
trait FacadeAwareTrait
{
    /**
     * @var \Symker\CoreBundle\Module\Back\Business\FacadeInterfaceModule
     */
    private $facade;

    /**
     * @param \Symker\CoreBundle\Module\Back\Business\FacadeInterfaceModule $facade
     *
     * @return void
     */
    public function setFacade(FacadeInterfaceModule $facade): void
    {
        $this->facade = $facade;
    }

    /**
     * @throws \Symker\CoreBundle\Module\Back\Business\Exception\FacadeNotFoundException
     *
     * @return \Symker\CoreBundle\Module\Back\Business\FacadeInterfaceModule
     */
    protected function getFacade(): FacadeInterfaceModule
    {
        if ($this->facade === null) {
            throw new FacadeNotFoundException('Facade not found in ' . static::class);
        }

        return $this->facade;
    }
}
