<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Front\Plugin;

use Symker\CoreBundle\Module\Client\ClientAwareTrait;
use Symker\CoreBundle\Module\Service\ServiceAwareTrait;

abstract class AbstractFrontPlugin implements AbstractFrontPluginInterface
{
    use ClientAwareTrait;
    use ServiceAwareTrait;
}
