# DebugKit AI Panel for CakePHP

## Installation
  * composer require cakedc/cakephp-debugkit-ai
  * Add `DebugKit.AI.apiKey` to your `app_local.php`
  * Load plugin in `Application::bootstrap()` and ensure it is done before loading `DebugKit` plugin:

```php
public function bootstrap(): void
{
...
$this->addPlugin(DebugKitAIPlugin::class, ['bootstrap' => true]);
$this->addPlugin('DebugKit', ['bootstrap' => true]);
...
}
```

## TODO

* HTML help
