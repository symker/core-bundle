<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Client;

use Symker\CoreBundle\Module\Service\ServiceAwareTrait;

abstract class AbstractClient implements ClientInterfaceModule
{
    use ServiceAwareTrait;
}
