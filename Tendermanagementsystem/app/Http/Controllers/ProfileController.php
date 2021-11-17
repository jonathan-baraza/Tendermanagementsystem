<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function showProfile($id){
    	$user=User::findOrFail($id);
    	return view('profiles',compact('user'));
    }
    public function updateTheme(Request $req){
    	$user=User::find(Auth::user()->id);
    	$user->profile()->update([
    		'theme_color'=>$req->theme_color,
    	]);
    	return back()->with('changed_theme_color','You have successfully changed your theme');
    }
    public function updateProfile(Request $req){
        $user=User::find($req->id);
            if($user->profile->photo=='/profile_pics/profile_pic_avatar.png' || $req->photo)
            {
                $data=request()->validate([
                    'name'=>'required|string',
                    'email'=>'required|email',
                    'location'=>'required',
                    'about_us'=>'required',
                    'phone_number'=>'',
                    'date_of_establishment'=>'required',
                    'instagram'=>'',
                    'twitter'=>'',
                    'facebook'=>'',
                    'whatsapp'=>'',
                    'photo'=>'mimes:jpg,jpeg,png',
                ]);
                
                $photo=$data['photo'];
                $photo_path=$photo->store('profile_pics','public');

                 $user->update([
                    'name'=>$data['name'],
                    'email'=>$data['email'],

                ]);
                $user->profile()->update([
                    'location'=>$data['location'],
                    'about_us'=>$data['about_us'],
                    'phone_number'=>$data['phone_number'],
                    'whatsapp'=>$data['whatsapp'],
                    'date_of_establishment'=>$data['date_of_establishment'],
                    'instagram'=>$data['instagram'],
                    'facebook'=>$data['facebook'],
                    'twitter'=>$data['twitter'],
                    'photo'=>$photo_path,
                ]);

                return back()->with('profile_updated','You have successfully updated your profile');  
            } 
            else{

                $data=request()->validate([
                    'name'=>'required|string|max:100',
                    'email'=>'required|email',
                    'location'=>'required',
                    'about_us'=>'required',
                    'date_of_establishment'=>'required',
                    'phone_number'=>'required',
                    'whatsapp'=>'string|max:100',
                    'instagram'=>'',
                    'facebook'=>'',
                    'twitter'=>'',
                ]);

                $user->update([
                    'name'=>$data['name'],
                    'email'=>$data['email'],

                ]);
                $user->profile()->update([
                    'location'=>$data['location'],
                    'about_us'=>$data['about_us'],
                    'phone_number'=>$data['phone_number'],
                    'date_of_establishment'=>$data['year_of_establishment'],
                    'whatsapp'=>$data['whatsapp'],
                    'instagram'=>$data['instagram'],
                    'facebook'=>$data['facebook'],
                    'twitter'=>$data['twitter'],
                ]);    

                 return back()->with('profile_updated','You have successfully updated your profile');          

            }
        
       
    }
}
