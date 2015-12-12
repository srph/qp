# qp [![Build Status](https://img.shields.io/travis/srph/qp.svg?style=flat-square)](https://travis-ci.org/srph/qp?branch=master) [![Latest Stable Version](https://poser.pugx.org/srph/qp/v/stable)](https://packagist.org/packages/srph/qp) [![Total Downloads](https://poser.pugx.org/srph/qp/downloads)](https://packagist.org/packages/srph/qp) [![Latest Unstable Version](https://poser.pugx.org/srph/qp/v/unstable)](https://packagist.org/packages/srph/qp) [![License](https://poser.pugx.org/srph/qp/license)](https://packagist.org/packages/srph/qp)
A library to parse or stringify query parameters in PHP.

## Installing
```bash
composer require srph/qp
```
Supports versions `>=5.5.9` (**including `7.0`**).

## Usage
```php
use Qp\Qp;
Qp::parse('username=kier'); // ['username' => 'kier']
Qp::parse('user[name]=kier'); // ['user' => ['name' => 'kier']];
Qp::parse('users[]=kier'); // ['users' => ['kier']]
Qp::stringify(['username' => 'kier', 'password' => '****']); // 'username=kier&password=*****'
```