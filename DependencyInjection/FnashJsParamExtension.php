<?php

namespace Fnash\JsParamBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
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
        if ($this->checkParams($exposedParams, $container))
        {
            $container->setParameter('fnash_js_param.exposed_params', $exposedParams);            
        }
        else
        {
            $container->setParameter('fnash_js_param.exposed_params', array());
        }
        
        
        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
    }
    
    private function checkParams(array $params, ContainerBuilder $container)
    {
        foreach($params as $param)
        {
            if ( ! $container->hasParameter($param))
            {
                throw new \InvalidArgumentException('The parameter '.$param.' does not exist.');
            }            
        }
        
        return true;
    }
}
