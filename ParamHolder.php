<?php

namespace Fnash\JsParamBundle;

class ParamHolder
{
    /**
     * @var array
     */
    private $parameters = [];

    /**
     * @param $key
     * @param $value
     */
    public function addParameter($key, $value)
    {
        $this->parameters[$key] = $value;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}
