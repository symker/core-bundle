<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Client\Plugin;

use Symker\CoreBundle\Module\Client\AllowedInClientModuleInterface;
use Symker\CoreBundle\Module\Client\ClientAwareInterface;

interface AbstractClientPluginInterface extends ClientAwareInterface, AllowedInClientModuleInterface
{
}
