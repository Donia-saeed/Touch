<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;
    protected $table='budgets';
protected $fillable=['id','name','created_at','updated_at','user_id'];
public $timestamps=['created_at','updated_at'];
public function user(){
    return $this->belongsTo('App\Models\User');
}

}
