# BlacksmithProject TokenGenerator

A PHP library to generate tokens.

## Installation:

`composer require blasksmith-project/token-generator`

## Usage:

```php
$token = TokenGenerator::generate();

echo $token->value();
```