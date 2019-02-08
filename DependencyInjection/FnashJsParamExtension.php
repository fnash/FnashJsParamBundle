<?php

namespace Fnash\JsParamBundle\DependencyInjection;

use Fnash\JsParamBundle\ParamHolder;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class FnashJsParamExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $exposedParams = $config['expose'];

        $definition = new Definition(ParamHolder::class);
        foreach ($exposedParams as $paramName) {
            if (!$container->hasParameter($paramName)) {
                throw new InvalidArgumentException('The parameter '.$paramName.' does not exist.');
            }

            $definition->addMethodCall('addParameter', [$paramName, $container->getParameter($paramName)]);
        }
        $container->setDefinition(ParamHolder::class, $definition);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
