<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

   // protected $created = ['date_create', 'date_update'];
   // protected $updated =['created_at','updated_at']->format('M d Y');
   protected $dates = ['created_at', 'updated_at'];

    public function Department()
    {
        return $this->belongsTo('App\department', 'department_id');
    }


    // $users->format_updated = Helpers::toFormatDateString($users->updated_at, 'M d, Y');
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
