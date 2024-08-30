# PhpCrudStarterKit Package

PhpCrudStarterKit is a very simple and small PHP package created for fun projects. It provides a basic Create, Read, Update, and Delete (CRUD) functionality using the file system with JSON. This package is ideal for small-scale applications or quick prototypes where a database is unnecessary.

## Installation

You can install this package via [Composer](https://getcomposer.org/):

```bash
composer require sharif/php-crud-starter-kit
```

## Example 
```bash

$app = \Sharif\PhpCrudStarterKit\App::getInstance();

// $app->create([ 'name' => 'Ahmed', 'email' => 'qyf9A@example.com' ]);
// $app->delete(1725026277);
// $app->update(1725026238, [ 'name' => 'Sharif', 'email' => 'sharif@example.com' ]);
// print_r($app->show_single( 1725026560 ) );