<?php

namespace SimplePermission\Models;


use SimplePermission\Traits\HasPermission;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasPermission;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('permission.table_names.users', 'laravel_users'));
    }
}