# BlacksmithProject TokenGenerator

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/BlacksmithProject/token-generator/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/BlacksmithProject/token-generator/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/BlacksmithProject/token-generator/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/BlacksmithProject/token-generator/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/BlacksmithProject/token-generator/badges/build.png?b=master)](https://scrutinizer-ci.com/g/BlacksmithProject/token-generator/build-status/master)

A PHP library to generate tokens.

## Installation:

`composer require blasksmith-project/token-generator`

## Usage:

```php
$token = TokenGenerator::generate();

echo $token->value();
```