<p align="center">
  <img src="https://laravel.com/assets/img/components/logo-laravel.svg" alt="Laravel" width="240" />
</p>

## Install

Require this package with composer using the following command:

```shell
$ composer require sormagec/roadrunner-laravel "^1.1"
```

> Installed `composer` is required ([how to install composer][getcomposer]).

> You need to fix the major version of package.

After that you can optionally "publish" default RoadRunner configuration files into your application root directory using next command:

```bash
$ php ./artisan vendor:publish --provider='Sormagec\RoadRunnerLaravel\ServiceProvider' --tag=rr-config
```

If you wants to disable package service-provider auto discover, just add into your `composer.json` next lines:

```json
{
    "extra": {
        "laravel": {
            "dont-discover": ["sormagec/roadrunner-laravel"]
        }
    }
}
```

## Usage

This package allows you to use "production ready" worker for RoadRunner, that you can extend as you want.

Out of the box it supports next run parameters:

| Name                                | Description                                                                                                                                    |
| ----------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------- |
| `--(not-)force-https`               | Force (or not) `https` schema usage (eg. for links generation)                                                                                 |
| `--(not-)reset-db-connections`      | Drop (or not) database connections after incoming request serving                                                                              |
| `--(not-)reset-redis-connections`   | Drop (or not) Redis connections after incoming request serving                                                                                 |
| `--(not-)refresh-app`               | Force refresh application instance after incoming request serving                                                                              |
| `--(not-)inject-stats-into-request` | Inject into each `Request` object macros `::getTimestamp()` and `::getAllocatedMemory()` that returns timestamp and used allocated memory size |
| `--not-fix-symfony-file-validation` | Do **not** fix `isValid` method in `\Symfony\Component\HttpFoundation\File\UploadedFile` [#10]                                                 |

> Parameters should be declared in RR configuration file (eg. `./.rr.local.yml`) in `http.workers.command`, eg. `php ./vendor/bin/rr-worker --some-parameter`

Also you can use next environment variables:

| Environment name     | Description                                                              |
| -------------------- | ------------------------------------------------------------------------ |
| `APP_BASE_PATH`      | Base path to the application                                             |
| `APP_BOOTSTRAP_PATH` | Path to the application bootstrap file _(default: `/bootstrap/app.php`)_ |
| `APP_FORCE_HTTPS`    | Force `https` schema usage (eg. for links generation)                    |

### Additional HTTP-headers

For forcing `https` schema usage you can pass special HTTP header `FORCE-HTTPS` with any non-empty value.

### Extending

You can extend this worker as you wish, for more information - "Look into the sources, Luke!".

### Testing

For package testing we use `phpunit` framework. Just write into your terminal _(installed `docker-ce` is required)_:

```bash
$ git clone git@github.com:avto-dev/roadrunner-laravel.git ./roadrunner-laravel && cd $_
$ make install
$ make test
```
