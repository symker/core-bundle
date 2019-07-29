<?php declare(strict_types = 1);

namespace Symker\CoreBundle\DependencyInjection\Compiler\Tag;

use Symfony\Component\DependencyInjection\ContainerBuilder;

class SymkerBundleTagPass extends AbstractTagPass
{
    public const TAG_BUNDLE = 'bundle';

    protected const PATTERN = 'Bundle';

    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     *
     * @return void
     */
    public function process(ContainerBuilder $container): void
    {
        foreach ($this->findSymkerServices($container) as $serviceId => $tags) {
            $parts = explode('\\', $serviceId);

            $bundle = $parts[1];
            if (strpos($bundle, static::PATTERN) !== false) {
                $this->addProperty($container->getDefinition($serviceId), static::TAG_BUNDLE, $bundle);
            }
        }
    }
}
