<?php

namespace Symker\CoreBundle\Module\Front\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symker\CoreBundle\Module\Client\ClientAwareInterface;
use Symker\CoreBundle\Module\Client\ClientAwareTrait;
use Symker\CoreBundle\Module\Front\FrontDependencyProviderAwareInterface;
use Symker\CoreBundle\Module\Front\FrontDependencyProviderAwareTrait;
use Symker\CoreBundle\Module\Service\ServiceAwareInterface;
use Symker\CoreBundle\Module\Service\ServiceAwareTrait;

abstract class AbstractController extends SymfonyAbstractController implements ClientAwareInterface, ServiceAwareInterface, FrontDependencyProviderAwareInterface
{
    use ClientAwareTrait;
    use ServiceAwareTrait;
    use FrontDependencyProviderAwareTrait;
}
