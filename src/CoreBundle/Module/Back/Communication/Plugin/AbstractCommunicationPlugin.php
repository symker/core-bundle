<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Back\Communication\Plugin;

use Symker\CoreBundle\Module\Back\Business\FacadeAwareTrait;
use Symker\CoreBundle\Module\Back\Persistence\PersistenceAwareTrait;

class AbstractCommunicationPlugin implements AbstractCommunicationPluginInterface
{
    use FacadeAwareTrait;
    use PersistenceAwareTrait;
}
