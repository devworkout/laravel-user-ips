# Laravel User IPs

Remember and track IPs of Laravel users.

## Installation

You can install the package via composer:

```bash
composer require devworkout/laravel-user-ips
```

## Usage


Add a HasIPs trait to your User model:

``` php

use \DevWorkout\UserIps\HasIPs;

```

Associate IP with user:

``` php

$user->rememberIP('127.0.0.1');

```

Get a list of associated IPs:

``` php

$ips = $user->ips()->pluck('ip');

```

Find IPs used by multiple users:

``` php

$ips = UserIP::withMultipleUsers()->get();

```

Find users using this IP:

``` php

$users = $ip->users();

```

#### Automatic IP recording

Automatic IP recording is enabled on login.


### Testing

``` bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email us instead of using the issue tracker.

## Credits

- [devworkout](https://github.com/devworkout)
- [All Contributors](../../contributors)

## Support us

Give us a star!

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
