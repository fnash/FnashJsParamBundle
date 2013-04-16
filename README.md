FnashJsParamBundle
==================

Simple way to expose some symfony2 container parameters to javascript

## Installation

### Step 1: Download sources

#### Option 1: via Composer

Add FnashJsParamBundle in your composer.json:

```js
{
    "require": {
        "fnash/fnash-js-param-bundle": "*"
    }
}
```

Then run:

``` bash
$ php composer.phar update fnash/fnash-js-param-bundle
```

#### Option 2: via Git

``` bash
$ git submodule add git://github.com/fnash/FnashJsParamBundle.git vendor/fnash/fnash-js-param-bundle/Fnash/JsParamBundle
```

or if you are using say SVN in your project

``` bash
$ git clone git://github.com/fnash/FnashJsParamBundle.git vendor/fnash/fnash-js-param-bundle/Fnash/JsParamBundle
```

Add `Fnash` namespace to autoload

```php
<?php
// app/autoload.php

$loader->registerNamespaces(array(
    // ...
    'Fnash' => __DIR__.'/../vendor/fnash/fnash-js-param-bundle',
    // ...
));
```

### Step 2: Register bundle in `AppKernel` class

```php
<?php
// app/AppKernel.php

$bundles = array(
    // ...
    new Fnash\JsParamBundle\FnashJsParamBundle(),
    // ...
);
```

### Step 3: Import routing

```php
# app/routing.yml

fnash_js_param_routing:
    resource: "@FnashJsParamBundle/Resources/config/routing.xml"
```


### Step 4: Configure

Given your parameters file

```yaml
# app/parameters.yml

parameters:
    param1:   value1
    param2:   value2
    param3:   value3
    param4:   value4
```

Add some parameters you want to expose in your javascript

```yaml
# app/config.yml

fnash_js_param: 
    expose: [param1, param2]
```

Be careful! Do not expose critical infos such as passwords etc..


### Step 5: Add javascript file to base template

```html
    {% block javascripts %}
    .............
    <script src="{{ path('fnash_js_param_js') }}"></script>
    .............
    {% endblock %}
    </body>
</html>
```

## Get your parameters from javascript

```js
alert(FnashJsParam.param1); // value1
alert(FnashJsParam.param2); // value2
```
