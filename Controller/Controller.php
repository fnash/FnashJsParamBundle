<?php

namespace Fnash\JsParamBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class Controller
{
    protected $extractor;
    
    
    public function __construct($extractor)
    {
        $this->extractor = $extractor;
    }
    
    public function index()
    {
        $parameters = $this->extractor->getParameters();
        $content = 'var FnashJsParam = '.json_encode($parameters).';';
        
        return new Response($content, 200, array('Content-Type' => 'text/javascript'));
    }
    
}