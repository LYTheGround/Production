<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * Cette Table consiste uniquement a se connecter.
     *
     * @var array
     */
    protected $fillable = [
        'name','email', 'password', 'updated_at'
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
     * Get the user's email
     *
     * @param string $value
     * @return string
     */
    public function getEmailAttribute($value):string
    {
        return decrypt($value);
    }

    /**
     * Set user's email
     *
     * @param $value
     * @return void
     */
    public function setEmailAttribute($value):void
    {
        $this->attributes['email'] = encrypt($value);
    }

    public function getLoginAttribute($value)
    {
        return decrypt($value);
    }

    public function setLoginAttribute($value):void
    {
        $this->attributes['login'] = encrypt($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function admins()
    {
        return $this->hasMany(Admin::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function member()
    {
        return $this->hasOne(Member::class);
    }
}
