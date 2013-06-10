yiipimple
=========

Integration dependency injection container Pimple in Yii framework

1) Install Pimple

composer.json:
```json
{
  "require": {
    "petrgrishin/yiipimple": "dev-master"
  },
  "repositories": [
    {
      "type": "git",
      "url": "http://github.com/petrgrishin/yiipimple"
    }
  ]
}
```

2) Change the entry scripts

Just change this
```php
Yii::createWebApplication($config)->run();
```
into
```php
Yii::createApplication('\YiiPimple\WebApplication', $config)->run();
```

3) Configuration

```php
return array(
    // ...
    // dipendency injection configuration
    'container' => array(
        'class' => '\YiiPimple\CContainer',
        'services' => array(
            // ... put here your services
        );
    ),
    // ...
);
```

4) Retrieve services

```php
$service = Yii::app()->getContainer()->get('service');
```

```php
// yii urlManager
$urlManager = Yii::app()->getContainer()->get('yii.core.urlManager');
```
