JSON API Server / Resource Mapper Bundle
=======================================
[![Build Status](https://travis-ci.org/eosnewmedia/JSON-API-Server-Resource-Mapper-Bundle.svg)](https://travis-ci.org/eosnewmedia/JSON-API-Server-Resource-Mapper-Bundle)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/eda4feff-eff4-4840-98b2-e3f93b6f5391/mini.png)](https://insight.sensiolabs.com/projects/eda4feff-eff4-4840-98b2-e3f93b6f5391)

Symfony integration for [enm/json-api-server-resource-mappers](https://eosnewmedia.github.io/JSON-API-Server-Resource-Mappers/)

1. [Installation](#installation)
1. [Usage](#usage)

## Installation

You should install `enm/json-api-server-bundle` before, but it's not required!

```bash
composer require enm/json-api-server-resource-mapper-bundle
```

in your `AppKernel`:

```php
public function registerBundles(): array
{
    $bundles = [
        // ...
        new Enm\Bundle\JsonApi\Server\ResourceMappers\EnmJsonApiServerResourceMapperBundle(),
        // ...
    ];
    
    return $bundles;
}
```

## Usage
Your resource mappers must be defined as services and tagged with `json_api_server.resource_mapper` to be detected by this bundle.

```yaml
services:
    app.resource_mappers.example:
        class: AppBundle\ResourceMappers\ExampleMapper
        tags:
            - { name: 'json_api_server.resource_mapper' }
```

The registry service, which you will need for dependency injection, is `Enm\JsonApi\Server\ResourceMappers\Mapper\ResourceMapperInterface`. 
