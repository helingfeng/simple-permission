<?php


namespace SimplePermission\Models;


use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    public static $default_permissions = ['show' => '查看', 'edit' => '编辑', 'delete' => '删除'];

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('permission.table_names.users_permissions', 'laravel_users_permissions'));
    }
}