<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Static pages
$staticRoutes = [
    '/' => 'welcome',
    'profile' => 'profile',
    'dashboard' => 'dashboard',
    'faq' => 'faq',
];

foreach ($staticRoutes as $name => $view) {
    Route::get("/{$name}", fn() => view($view))->name($name);
}

// Blog routes
$blogRoutes = [
    ['method' => 'get', 'uri' => 'blog/create', 'action' => 'create', 'name' => 'blog.create'],
    ['method' => 'post', 'uri' => 'articles', 'action' => 'store', 'name' => 'articles.store'],
    ['method' => 'get', 'uri' => 'blog', 'action' => 'index', 'name' => 'blog.index'],
    ['method' => 'get', 'uri' => 'blog/{article:uri}', 'action' => 'show', 'name' => 'blog.show'],
    ['method' => 'delete', 'uri' => 'blog/{article:uri}', 'action' => 'delete', 'name' => 'blog.delete'],
];

foreach ($blogRoutes as $route) {
    Route::{$route['method']}($route['uri'], [PostController::class, $route['action']])->name($route['name']);
}
