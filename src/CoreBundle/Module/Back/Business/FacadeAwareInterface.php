<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Back\Business;

interface FacadeAwareInterface
{
    /**
     * @param \Symker\CoreBundle\Module\Back\Business\FacadeInterfaceModule $facade
     *
     * @return void
     */
    public function setFacade(FacadeInterfaceModule $facade): void;
}
