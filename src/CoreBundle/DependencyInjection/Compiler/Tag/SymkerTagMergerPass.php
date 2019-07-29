<?php declare(strict_types = 1);

namespace Symker\CoreBundle\DependencyInjection\Compiler\Tag;

use Symfony\Component\DependencyInjection\ContainerBuilder;

class SymkerTagMergerPass extends AbstractTagPass
{
    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     *
     * @return void
     */
    public function process(ContainerBuilder $container)
    {
        foreach ($this->findSymkerServices($container) as $serviceId => $tags) {
            $container->getDefinition($serviceId)
                ->clearTag(static::TAG_ID)
                ->addTag(static::TAG_ID, $this->flattenTags($tags));
        }
    }

    /**
     * @param array $tags
     *
     * @return string[]
     */
    protected function flattenTags(array $tags): array
    {
        $flattened = [];

        foreach ($tags as $tag) {
            foreach ($tag as $name => $value) {
                $flattened[$name] = $value;
            }
        }

        return $flattened;
    }
}
