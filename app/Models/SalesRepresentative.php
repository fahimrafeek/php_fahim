<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesRepresentative extends Model
{
    protected $table = 'sales_representatives';
    public $timestamps = true;
    protected $dates = ['joined_date', 'created_at', 'updated_at'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user() {
        return $this->belongsTo('App\Models\User', 'added_by', 'id');
    }
    
}