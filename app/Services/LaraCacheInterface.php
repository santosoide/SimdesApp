<?php


namespace SimdesApp\Services;


interface LaraCacheInterface {

    public function get($section, $key);

    public function put($section, $key, $value, $minutes);

    public function has($section, $key);
} 