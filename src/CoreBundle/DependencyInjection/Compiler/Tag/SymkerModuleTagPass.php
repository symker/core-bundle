<?php declare(strict_types = 1);

namespace Symker\CoreBundle\DependencyInjection\Compiler\Tag;

use Symfony\Component\DependencyInjection\ContainerBuilder;

class SymkerModuleTagPass extends AbstractTagPass
{
    public const TAG_MODULE = 'module';

    protected const MODULES = [
        'Front',
        'Back',
        'Client',
        'Service',
    ];

    /**
     * @var array
     */
    private $modules;

    /**
     * @param array $modules
     */
    public function __construct(array $modules = self::MODULES)
    {
        $this->modules = $modules;
    }

    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     *
     * @return void
     */
    public function process(ContainerBuilder $container): void
    {
        foreach ($this->findSymkerServices($container) as $serviceId => $tags) {
            $this->processServiceId($container, $serviceId);
        }
    }

    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     * @param string $serviceId
     *
     * @return void
     */
    protected function processServiceId(ContainerBuilder $container, string $serviceId): void
    {
        $parts = explode('\\', $serviceId);
        $currentModule = $parts[3];

        foreach ($this->modules as $module) {
            if ($module === $currentModule) {
                $this->addProperty(
                    $container->getDefinition($serviceId),
                    static::TAG_MODULE,
                    $module
                );

                return;
            }
        }
    }
}
