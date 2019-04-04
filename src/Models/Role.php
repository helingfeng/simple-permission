<?php
/**
 * User: helingfeng
 */

namespace SimplePermission\Models;


use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('permission.table_names.role', 'laravel_roles'));
    }
}