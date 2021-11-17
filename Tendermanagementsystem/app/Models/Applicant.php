<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user(){
    	return $this->belongsTo(User::class);
    }
    public function applications(){
    	return $this->hasMany(Application::class);
    }
}
