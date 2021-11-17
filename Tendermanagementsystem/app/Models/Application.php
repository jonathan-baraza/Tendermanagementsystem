<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function applicant(){
    	return $this->belongsTo(Applicant::class);
    } 
     public function payment(){
    	return $this->belongsTo(Payment::class);
    }
     public function tender(){
    	return $this->belongsTo(Tender::class);
    }   
    public function contract(){
        return $this->hasOne(Contract::class);
    }
}
