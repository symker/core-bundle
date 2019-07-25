<?php

namespace Symker\CoreBundle\Module\Back\Business;

use Symker\CoreBundle\Module\Back\Business\Exception\FacadeNotFoundException;

trait FacadeAwareTrait
{
    private $facade;

    /**
     * @param \Symker\CoreBundle\Module\Back\Business\AbstractFacade $facade
     *
     * @return void
     */
    public function setFacade(AbstractFacade $facade): void
    {
        $this->facade = $facade;
    }

    protected function getFacade(): AbstractFacade
    {
        if ($this->facade === null) {
            throw new FacadeNotFoundException(__CLASS__);
        }

        return $this->facade;
    }
}
