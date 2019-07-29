<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Front\Controller;

use Symker\CoreBundle\Module\Client\ClientAwareInterface;
use Symker\CoreBundle\Module\Service\ServiceAwareInterface;

interface ControllerInterface extends ClientAwareInterface, ServiceAwareInterface
{
}
