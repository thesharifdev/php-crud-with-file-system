# PhpCrudStarterKit Package

PhpCrudStarterKit is a very simple and small PHP package created for fun projects. It provides a basic Create, Read, Update, and Delete (CRUD) functionality using the file system with JSON. This package is ideal for small-scale applications or quick prototypes where a database is unnecessary.

## Installation

You can install this package via [Composer](https://getcomposer.org/):

```bash
composer require sharif/php-crud-starter-kit
```

## Example 
```bash
<?php

require_once __DIR__ . '/src/App.php';

$App = \Sharif\PhpCrudStarterKit\App::getInstance();

// $App->create([ 'name' => 'Ahmed', 'email' => 'qyf9A@example.com' ]);
// $App->delete(1725026277);
// $App->update(1725026238, [ 'name' => 'Sharif', 'email' => 'sharif@example.com' ]);
// print_r($App->show_single( 1725026560 ) );