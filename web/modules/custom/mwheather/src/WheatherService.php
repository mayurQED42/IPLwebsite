<?php

namespace  Drupal\mwheather;

use Guzzle\Http\Client;

class WheatherService{
    function get_wheather_data($city)
    {
        $config = \Drupal::config('mwheather.settings');
        $appid= $config->get('appid');
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://samples.openweathermap.org/data/2.5/weather?q='.$city.'&appid='.$appid);
        return $response->getBody();
    }
}