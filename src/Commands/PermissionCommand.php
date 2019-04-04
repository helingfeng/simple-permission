<?php
/**
 * User: helingfeng
 */

namespace SimplePermission\Commands;


use Illuminate\Console\Command;
use SimplePermission\Models\UserPermission;

class PermissionCommand extends Command
{
    protected $signature = 'command:permission';
    protected $description = '所有权限';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $menus = laravel_menu();
        $data = [];
        foreach ($menus as $f1) {
            $string = '菜单:' . $f1['name'] . PHP_EOL;
            foreach ($f1['children'] as $f2) {
                foreach ($f2['children'] as $f3) {
                    $include = UserPermission::$default_permissions;
                    isset($f3['expect']) && $f3['expect'] == 1 && $include = [];
                    $permissions = array_merge($include, empty($f3['permission']) ? [] : $f3['permission']);
                    foreach ($permissions as $key => $value) {
                        $string .= $f3['name'] . '-' . $value . '   ';
                    }
                    $permissions && $string .= PHP_EOL;
                }
            }
            $data[] = [$string];
        }
        $this->output->table(['所有权限列表'], $data);
    }
}