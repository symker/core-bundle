<?php declare(strict_types = 1);

namespace Symker\CoreBundle\Module\Back\Communication\Console;

use Symfony\Component\Console\Command\Command;
use Symker\CoreBundle\Module\Back\Business\FacadeAwareTrait;

abstract class AbstractCommand extends Command implements AbstractCommandInterface
{
    use FacadeAwareTrait;
}
