# Package under heavy development - use at own risk

1. Install via Composer
```php
composer require ccom/clickatell
```

2. Update config/app.php to add service provider
```php
Ccom\Clickatell\ClickatellServiceProvider::class,
```

3. Publish Configs
```php
php artisan vendor:publish
```

4. Update config/clickatell and set your API key, alternatively create a ENV variable "CLICKATELL_KEY"