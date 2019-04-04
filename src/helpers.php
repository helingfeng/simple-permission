<?php

if (!function_exists('laravel_menu')) {
    function laravel_menu()
    {
        return config('menu', []);
    }
}