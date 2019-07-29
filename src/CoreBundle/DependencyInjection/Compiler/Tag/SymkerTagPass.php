<?php declare(strict_types = 1);

namespace Symker\CoreBundle\DependencyInjection\Compiler\Tag;

use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Tags application level code for further processing.
 *
 * Must be run as the first Symker compiler pass.
 */
class SymkerTagPass extends AbstractTagPass
{
    public const TAG_NAME = 'name';

    public const DEFAULT_PATTERNS = ['App\\', 'app.'];

    /**
     * @var string[]
     */
    private $patterns;

    /**
     * @param string[] $patterns
     */
    public function __construct(array $patterns = self::DEFAULT_PATTERNS)
    {
        $this->patterns = $patterns;
    }

    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     *
     * @return void
     */
    public function process(ContainerBuilder $container): void
    {
        foreach ($container->getServiceIds() as $id) {
            $this->processService($container, $id);
        }
    }

    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     * @param string $id
     *
     * @return void
     */
    protected function processService(ContainerBuilder $container, string $id): void
    {
        if ($this->isSymkerService($container, $id) === false) {
            return;
        }

        $this->addProperty($container->getDefinition($id), static::TAG_NAME, static::TAG_ID);
    }

    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     * @param string $id
     *
     * @return bool
     */
    protected function isSymkerService(ContainerBuilder $container, string $id): bool
    {
        if ($container->hasDefinition($id) === false) {
            return false;
        }

        foreach ($this->patterns as $pattern) {
            if (strpos($id, $pattern) === 0) {
                return true;
            }
        }

        return false;
    }
}
