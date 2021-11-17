<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $guarded=[];
    use HasFactory;
    

    public function user(){
    	return $this->belongTo(User::class);
    }
}
