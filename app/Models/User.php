<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
     * @var string[]
     */


    const REJECTED=0;
    const APPROVED=1;
    const PENDING=2;

    const DEVELOPER=1;
    const ADMIN=2;
    const GENERALUSER=3;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'cv_link',
        'user_role',
        'status',
        'user_role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
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
     * The attributes that should be cast.
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

    public function getApprovalStatusAttribute() {

        if ($this->status==1){
            return 'Approved';
        }elseif($this->status==0){
            return 'Rejected';
        }elseif($this->status==2){
            return 'Pending';
        }
    }


    public function allGeneralUsers(){
        return $this->where('user_role',3)->get();
    }

    public function getIsAdminAttribute(){
         if ($this->user()->user_role==2){
             return true;
         }else{
            return false;
         }
    }
}
