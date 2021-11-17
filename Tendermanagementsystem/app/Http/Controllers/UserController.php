<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function allUsers(){
    	if(Auth::user()->role=='admin')
    	{
    		$users=User::orderBy('id','DESC')->get();
    		return view('all-users',compact('users'));
    	}
    	else
    	{
    		return view('errors/unauthorized');
    	}
    	
    }
    public function changeUserStatus($id){
    	$user=User::find($id);
    	if($user->status=='active')
    	{
    		$user->update([
    			'status'=>'inactive',
    		]);
    		return back()->with("status_changed","You have deactivated ".$user->name);
    	}
    	else{
    		$user->update([
    			'status'=>'active',
    		]);

    		return back()->with("status_changed","You have activated ".$user->name);
    	}
    }
}
