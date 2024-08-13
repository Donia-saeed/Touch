<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'title','description','user_id','budget_id','created_at','updated_at'];
    public $timestamps=['created_at','updated_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function budget(){
        return $this->belongsTo(Budget::class);
    }
}
