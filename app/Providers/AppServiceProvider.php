<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    // public function boot(): void
    // {
    //     //
    // }

    public function boot()
    {
        // Custom validation rule for Google reCAPTCHA
        Validator::extend('recaptcha', function ($attribute, $value, $parameters, $validator) {
            $client = new Client();
            $secret = env('RECAPTCHA_SECRET_KEY');
            $url = 'https://www.google.com/recaptcha/api/siteverify';

            // Send request to Google reCAPTCHA
            $response = $client->post($url, [
                'form_params' => [
                    'secret' => $secret,
                    'response' => $value,
                ],
            ]);

            $body = json_decode((string) $response->getBody(), true);
            return isset($body['success']) && $body['success'];
        });
    }
}
