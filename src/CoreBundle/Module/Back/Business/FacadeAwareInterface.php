<?php

namespace Symker\CoreBundle\Module\Back\Business;

interface FacadeAwareInterface
{
    public function setFacade(AbstractFacade $facade): void;
}
