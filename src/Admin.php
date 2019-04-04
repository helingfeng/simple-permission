<?php

namespace SimplePermission;


use Illuminate\Support\Facades\Auth;
use SimplePermission\Models\User;

class Admin
{
    public function user(): User
    {
        return Auth::guard(config('permission.guard'))->user();
    }

    public function menu(User $user)
    {
        $menus = laravel_menu();
        $permissions = $user->allPermission()->toArray();
        list($floor1, $floor2, $floor3, $floors) = [[], [], [], []];
        foreach ($permissions as $permission) {
            $dot_array = explode('.', $permission);
            array_pop($dot_array);
            $key3 = implode('', $dot_array);
            array_pop($dot_array);
            $key2 = implode('', $dot_array);
            array_pop($dot_array);
            $key1 = implode('', $dot_array);
            array_key_exists($key1, $floor1) || $floor1[$key1] = $key1;
            array_key_exists($key2, $floor2) || $floor2[$key2] = $key2;
            array_key_exists($key3, $floor3) || $floor3[$key3] = $key3;
        }
        foreach ($menus as $f1) {
            if (in_array($f1['slug'], $floor1))
                foreach ($f1['children'] as $f2) {
                    if (in_array("{$f1['slug']}{$f2['slug']}", $floor2))
                        foreach ($f2['children'] as $f3) {
                            if (in_array("{$f1['slug']}{$f2['slug']}{$f3['slug']}", $floor3)) {
                                $floors[$f1['slug']] = array_except($f1, ['children']);
                                $floors[$f1['slug']]['children'][$f2['slug']] = array_except($f2, ['children']);
                                $floors[$f1['slug']]['children'][$f2['slug']]['children'][] = $f3;
                            }
                        }
                }
        }
        return $floors;
    }
}