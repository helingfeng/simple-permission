<?php

if (!function_exists('laravel_menu')) {
    function laravel_menu()
    {
        return config('menu', []);
    }
}

if (!function_exists('permission_can')) {
    function permission_can($slug)
    {
        return Auth::guard(config('permission.guard'))->user()->can($slug);
    }
}