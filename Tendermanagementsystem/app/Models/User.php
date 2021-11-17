<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'national_id',
        'status',
        'password',
    ];

    public static function boot(){
        parent::boot();
        static::created(function($user){
            if($user->role!='applicant'){
                $user->profile()->create([
                     'theme_color'=>'#28a745',
                     'photo'=>'/images/wp4211338-kenya-flag-wallpapers.jpg',
                     'location'=>'Nairobi',
                     'about_us'=>'The Government of Kenya, for you, with you.',
                     'date_of_establishment'=>date('1963-12-12'),
                     'instagram'=>'go.ke',
                     'facebook'=>'kenyangovernment',
                     'twitter'=>'@governmentofkenya',
                ]);
            }
            else{
                $user->profile()->create([
                     'theme_color'=>'#28a745',
                     'photo'=>'/profile_pics/profile_pic_avatar.png',
                ]);
                $user->applicant()->create([
                    
                ]);
            }
            
        });
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function profile(){
        return $this->hasOne(Profile::class);
    }
    public function applicant(){
        return $this->hasOne(Applicant::class);
    }
}
