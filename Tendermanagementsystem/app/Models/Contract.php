<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
	protected $guarded=[];
    use HasFactory;

    public function application(){
    	return $this->belongsTo(Application::class);
    } 
}
