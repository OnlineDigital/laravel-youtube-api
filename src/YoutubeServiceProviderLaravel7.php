<?php

namespace Madcoda\Youtube;

use Madcoda\Youtube\Youtube;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

class YoutubeServiceProviderLaravel7 extends ServiceProvider
{
    protected $defer = true;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/youtube.php' => config_path('youtube.php'),
        ]);
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Madcoda\Youtube\Youtube', function ($app) {
            $youtube = new Youtube($app['config']->get('youtube'));
            $youtube->setHttpFunction([self::class, 'httpFunction']);
            return $youtube;
        });
    }

    /**
     * Using laravel's Http wrapper to issue a GET request
     *
     * @param $url
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public static function httpFunction($url, $params, $context)
    {
        $params['key'] = $context->youtube_key;
        $url = $url . (strpos($url, '?') === false ? '?' : '') . http_build_query($params);

        $headers = [];
        if ($context->referer !== null) {
            $headers['Referer'] = $context->referer;
        }

        $options = [];
        if ($context->sslPath !== null) {
            $options['verify'] = $context->sslPath;
        }

        $response = Http::withOptions($options)
            ->withHeaders($headers)
            ->get($url);

        return $response;
    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['Madcoda\Youtube\Youtube'];
    }
}
