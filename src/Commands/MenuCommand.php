<?php
/**
 * User: helingfeng
 */

namespace SimplePermission\Commands;


use Illuminate\Console\Command;

class MenuCommand extends Command
{
    protected $signature = 'command:menu';
    protected $description = '所有菜单';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $menus = laravel_menu();
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
        $this->output->table(['所有菜单列表'], $data);
    }
}
