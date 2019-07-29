<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Client\Plugin;

use Symker\CoreBundle\Module\Client\ClientAwareTrait;

abstract class AbstractClientPlugin implements AbstractClientPluginInterface
{
    use ClientAwareTrait;
}
