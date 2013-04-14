<?php

namespace Fnash\JsParamBundle\Extractor;

class ParametersExtractor implements ParametersExtractorInterface
{
    
    protected $paramNames = array();
    
    protected $parameters = array();
    
    protected $container;

    public function __construct($container, array $paramNames)
    {
        $this->container = $container;
        $this->paramNames = $paramNames;
        
        $this->buildParameters();
    }

    public function buildParameters()
    {
        foreach ($this->paramNames as $paramName)
        {
            $this->parameters[$paramName] = $this->container->getParameter($paramName);
        }
    }
    
    public function getParameters()
    {
        return $this->parameters;
    }

}
