<?php declare(strict_types = 1);

namespace Symker\CoreBundle\DependencyInjection\Compiler\Tag;

use Symfony\Component\DependencyInjection\Definition;
use Symker\CoreBundle\DependencyInjection\Compiler\AbstractCompilerPass;

abstract class AbstractTagPass extends AbstractCompilerPass
{
    /**
     * @param \Symfony\Component\DependencyInjection\Definition $definition
     * @param string $name
     * @param string $value
     *
     * @return void
     */
    protected function addProperty(Definition $definition, string $name, string $value): void
    {
        $definition->addTag(static::TAG_ID, [$name => $value]);
    }
}
