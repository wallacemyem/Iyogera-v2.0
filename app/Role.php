<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['title'];
    
    
    public function permission()
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }
}
