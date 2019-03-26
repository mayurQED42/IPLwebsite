<?php

namespace  Drupal\weather;

use Guzzle\Http\Client;

class WeatherService{
    function get_wheather_data($city)
    {
        $config = \Drupal::config('weather.settings');
        $appid= $config->get('appid');
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://samples.openweathermap.org/data/2.5/weather?q='.$city.'&appid='.$appid);
        return $response->getBody();
    }
}