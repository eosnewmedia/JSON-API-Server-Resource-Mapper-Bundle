JSON API Server / Resource Mapper Bundle
=======================================

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
        new Enm\Bundle\JsonApi\Server\ResourceMappers\EnmJsonApiResourceMapperBundle(),
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

The registry service, which you will need for dependency injection, is `enm.json_api_server.resource_mappers`. 
