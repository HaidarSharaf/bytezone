<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $table = 'roles';

    public function admins(){
        return $this->hasMany(Admin::class);
    }
}
