<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    public $timestamps = true;
    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function role_permissions() {
        return $this->hasMany('App\Models\RolePermission');
    }
    
}