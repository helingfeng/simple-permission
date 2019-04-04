<?php
/**
 * User: helingfeng
 */

namespace SimplePermission\Commands;


use Illuminate\Console\Command;
use SimplePermission\Admin;
use SimplePermission\Models\User;

class UserCommand extends Command
{
    protected $signature = 'command:user';
    protected $description = '用户菜单与权限';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(Admin $admin)
    {
        $user = User::first();
        $menus = $admin->menu($user);
        $data = [];
        foreach ($menus as $f1) {
            array_push($data, ['-' . $f1['name']]);
            foreach ($f1['children'] as $f2) {
                array_push($data, ['---' . $f2['name']]);
                foreach ($f2['children'] as $f3) {
                    array_push($data, ['------' . $f3['name']]);
                }
            }
        }
        $this->output->table(['用户拥有菜单'], $data);

        $p[] = [implode('|', $user->allPermission()->toArray())];
        $this->output->table(['用户拥有权限'], $p);
    }
}