## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
php composer.phar require --prefer-dist diogopms/yii2-rollbar "*"
```

or add

```json
"diogopms/yii2-rollbar": "*"
```

to the require section of your `composer.json` file.

## Usage

All of these blocks may be included in one config file (frontend/config/main-local.php) for 
quite simple applications, but here I`m describing installation for real "advanced" monsters
like our [elections platform](http://igraprestolov.vybory.tv/).

Your most global main.php file:

```php
'bootstrap' => ['rollbar'],
'components' => [
    'rollbar' => [
        'class' => 'diogopms\yii2_rollbar\RollbarComponent',
        'accessToken' => 'POST_SERVER_ITEM_ACCESS_TOKEN',
    ],
],
```

main-local.php (common/config/main-local.php for advanced app template):

```php
'components' => [
  'rollbar' => [
      'environment' => 'production', // you environment name
  ],
],
```

web error handler (frontend/config/main-local.php for advanced app template):

```php
'components' => [
  'errorHandler' => [
      // handling uncaught PHP exceptions, execution and fatal errors
      'class' => 'diogopms\yii2_rollbar\WebErrorHandler',
  ],
],
```

console error handler (console/config/main-local.php for advanced app template):

```php
'components' => [
  'errorHandler' => [
      // handling uncaught PHP exceptions, execution and fatal errors
      'class' => 'diogopms\yii2_rollbar\ConsoleErrorHandler',
  ],
],
```

## Does it work?

You can just write incorrect settings for database connection and refresh a site page or execute any console command. Rollbar issues will appear at the Dashboard in a few seconds.
