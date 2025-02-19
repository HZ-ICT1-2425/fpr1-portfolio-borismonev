<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\FaqController;

// Static pages

foreach (StaticPageController::getRoutes() as $name => $view) {
    Route::get("/{$name}", fn() => view($view))->name($name);
}

// Blog routing
foreach (PostController::getRoutes() as $postRoute) {
    Route::{$postRoute['method']}($postRoute['uri'], [PostController::class, $postRoute['action']])->name($postRoute['name']);
}

// Faq routing
foreach (FaqController::getRoutes() as $faqRoute) {
    Route::{$faqRoute['method']}($faqRoute['uri'], [FaqController::class, $faqRoute['action']])->name($faqRoute['name']);
}
