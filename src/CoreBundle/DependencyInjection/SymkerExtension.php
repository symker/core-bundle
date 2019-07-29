<?php declare(strict_types = 1);

namespace Symker\CoreBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;

abstract class SymkerExtension extends Extension
{
    protected const SERVICES_FILE = 'services.php';

    /**
     * @param array $configs
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     *
     * @return void
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        if ($this->isFrontKernel($container)) {
            $loader = new PhpFileLoader(
                $container,
                new FileLocator($this->getConfigDir())
            );
            $loader->load(static::SERVICES_FILE);
        }
    }

    /**
     * @return string
     */
    protected function getConfigDir(): string
    {
        return $this->getCurrentDir() . '/../Resources/config';
    }

    /**
     * @return string
     */
    abstract protected function getCurrentDir(): string;

    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     *
     * @return bool
     */
    protected function isFrontKernel(ContainerBuilder $container): bool
    {
        return true;
    }
}
