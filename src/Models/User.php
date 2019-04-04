<?php
/**
 * User: helingfeng
 */

namespace SimplePermission\Models;


use Illuminate\Database\Eloquent\Model;
use SimplePermission\Traits\HasPermission;

class User extends Model
{
    use HasPermission;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('permission.table_names.users', 'laravel_users'));
    }
}