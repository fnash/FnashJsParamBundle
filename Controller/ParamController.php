<?php

namespace Fnash\JsParamBundle\Controller;

use Fnash\JsParamBundle\ParamHolder;
use Symfony\Component\HttpFoundation\Response;

class ParamController
{
    public function jsAction(ParamHolder $paramHolder)
    {
        $content = sprintf('window.FnashJsParam = %s;', json_encode($paramHolder->getParameters()));
        
        return new Response($content, 200, ['Content-Type' => 'text/javascript']);
    }
}
