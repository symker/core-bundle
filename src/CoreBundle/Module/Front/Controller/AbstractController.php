<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Front\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symker\CoreBundle\Module\Client\ClientAwareTrait;
use Symker\CoreBundle\Module\Service\ServiceAwareTrait;

abstract class AbstractController extends SymfonyAbstractController implements ControllerInterface
{
    use ClientAwareTrait;
    use ServiceAwareTrait;
}
