laravel-youtube-api
===============

A basic PHP wrapper for the Youtube Data API v3 ( Non-OAuth ). Designed to let devs easily 
fetch public data (Video, Channel, Playlists info) from Youtube. No 3rd party dependancy (except PHPUnit).
The reason for returning the decoded JSON response directly, is that you only need to read the Google API doc 
to use this library, instead of learning my set of API again (Keep it simple).

Well.. actually some parameters are missing in this library, because I don't need them at this point. If you desire a particular feature, please [file an issue here](https://github.com/madcoda/php-youtube-api/issues) :)

Currently I will not consider adding OAuth endpoints. (those required "authorized request" will not be supported)

## Fork
This fork allows you to change the http function and comes with a provider for Laravel 7+ to use laravel's Http facade instead of curl for every request.
Add `\Madcoda\Youtube\YoutubeServiceProviderLaravel7::class,` in `config/app.php`, inside `providers` array.

## Requirements
* PHP >=5.3
* CURL extension in PHP

## Install
Run the following command in your command line shell for your php project
```sh
$ composer require madcoda/php-youtube-api:^1.2
```
Done.

You may also edit composer.json manually then perform ```composer update```
```
"require": {
    "madcoda/php-youtube-api": "^1.2"
}
```

## Getting started
Please read the wiki on how to use this library with [PHP with composer](https://github.com/madcoda/php-youtube-api/wiki/started-with-php-composer), [Laravel 4](https://github.com/madcoda/php-youtube-api/wiki/started-with-laravel-4) and [Laravel 5](https://github.com/madcoda/php-youtube-api/wiki/started-with-laravel-5).

For the functions implemented in this library, please visit [API Reference](https://github.com/madcoda/php-youtube-api/wiki/api-reference)

### Example usage with pure PHP (with composer)
```php
require 'vendor/autoload.php';
$youtube = new Madcoda\Youtube\Youtube(array('key' => '* Your API key here *'));
$video = $youtube->getVideoInfo('rie-hPVJ7Sw');
```

### Example usage with Laravel 4/5
```php
$video = Youtube::getVideoInfo(Input::get('vid', 'dQw4w9WgXcQ');
```


## Format of returned data
The returned json is decoded as PHP objects (not Array).
Please read the ["Reference" section](https://developers.google.com/youtube/v3/docs/) of the official API doc.


## YouTube Data API v3
- [YouTube Data API v3 Doc](https://developers.google.com/youtube/v3/)
- [Obtain API key from Google API Console](http://code.google.com/apis/console)

## Contact

For bugs, complaints, or suggestions, please [file an Issue here](https://github.com/madcoda/php-youtube-api/issues) 
or send email to jason@madcoda.com :)


## License

This repo `madcoda/php-youtube-api` is licensed under the [MIT License](http://opensource.org/licenses/MIT).
