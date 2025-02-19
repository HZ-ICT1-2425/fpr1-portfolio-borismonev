<?php

namespace App\Http\Controllers;

class StaticPageController extends Controller
{
    private static array $staticRoutes = [
        '/' => 'welcome',
        'profile' => 'profile',
        'dashboard' => 'dashboard'
    ];

    /**
     * Method for getting the static routes.
     * @return string[]
     */
    public static function getRoutes(): array
    {
        return self::$staticRoutes;
    }
}
