<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $table = 'role_permissions';
    public $timestamps = true;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function role() {
        return $this->belongsTo('App\Models\Role');
    }
    
}