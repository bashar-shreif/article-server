<?php

require("../connection/connection.php");
class Route
{
    public static function Route(array $api, string $route, string $path)
    {
        $path = str_replace('()', '', $path);
        list($class, $method) = explode('::', $path);
        $api[] = [$route => ['controller' => $class, 'method' => $method]];
    }
}