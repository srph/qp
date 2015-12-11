# qp
A library to parse or stringify query parameter in PHP.

## Installing
```bash
composer require srph/qp
```

## Usage
```php
use Qp\Qp;
Qp::parse('username=kier'); // ['username' => 'kier']
Qp::parse('user[name]=kier'); // ['user' => ['name' => 'kier']];
Qp::parse('users[]=kier'); // ['users' => ['kier']]
Qp::stringify(['username' => 'kier', 'password' => '****']); // 'username=kier&password=*****'
```

## Todo
- [] Support nested arrays in Parsing
- [] Support nested objects in Parsing
- [] Support arrays / object in Stringifying