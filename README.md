# Cronify Package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/schubu/cronify.svg?style=flat-square)](https://packagist.org/packages/schubu/cronify)
[![Build Status](https://img.shields.io/travis/schubu/cronify/master.svg?style=flat-square)](https://travis-ci.org/schubu/cronify)
[![Quality Score](https://img.shields.io/scrutinizer/g/schubu/cronify.svg?style=flat-square)](https://scrutinizer-ci.com/g/schubu/cronify)
[![Total Downloads](https://img.shields.io/packagist/dt/schubu/cronify.svg?style=flat-square)](https://packagist.org/packages/schubu/cronify)

Add cron-patterns to your models to check for validity. For example: you can check if a given post should be viewed.

## Installation

You can install the package via composer:

```bash
composer require schubu/cronify
```

After you've installed the package please run the installer. It published the migration file.
``` php
php artisan cronify:install
```

After that you've got to run your migration
``` php
php artisan migrate
```

A new crons table is added to your database. It stores your cron entries for your models. 

## Cronify your models
Next step is to add the Cronable trait to your models.

``` php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Schubu\Cronify\Traits\Cronable;

class Post extends Model
{
    use Cronable;

    // ...
}
```

## Usage
Given you've a post model with a title and a body field here is how to add a post with a cron pattern:

``` php
$post = Post::create([
    "title"=>"Your title", 
    "body" => "Lorem ipsum"
]);

$post->crons()->create([
    'pattern' => '* * 1 1 *'
]);
```

In this case you can ask for your pattern if it is due:

``` php
App\Models\Post::latest()->first()->isDue()
```

In our example it returns true only for the first of january. 

## Hints
You can add multiple cron patterns. If at least one rule matches you get true.

You can provide a date for the method ```->isDue($timestamp) ``` so you can check the due of your model at a given date. 



[comment]: <> (### Testing)

[comment]: <> (``` bash)

[comment]: <> (composer test)

[comment]: <> (```)

[comment]: <> (### Changelog)

[comment]: <> (Please see [CHANGELOG]&#40;CHANGELOG.md&#41; for more information what has changed recently.)

[comment]: <> (## Contributing)

[comment]: <> (Please see [CONTRIBUTING]&#40;CONTRIBUTING.md&#41; for details.)

### Security

If you discover any security related issues, please email peter@schu-bu.de instead of using the issue tracker.

## Credits

- [Peter Schulze-Buxloh](https://github.com/schubu)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
