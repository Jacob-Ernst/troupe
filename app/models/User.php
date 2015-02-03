<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	
	use SoftDeletingTrait;
    
    protected $dates = ['deleted_at'];
    
    public static $rules = array(
        'email'            => 'required|max:200|email|unique:users', 
        'password'         => 'required|max:255|min:6',
        'first_name'       => 'required|max:255',
        'last_name'        => 'required|max:255'
    );

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
    
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }
    
    public function setGenderAttribute($value)
    {
        $this->attributes['gender'] = strtolower($value);
    }
    
    public function setRoleAttribute($value)
    {
        $this->attributes['role'] = strtolower($value);
    }
    
    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = strtolower($value);
    }
    
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = $value;
        $this->attributes['first_name_meta'] = metaphone($value);
    }
    
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = $value;
        $this->attributes['last_name_meta'] = metaphone($value);
    }
	
    public function images()
    {
        return $this->morphMany('Image', 'imageable');
    }
    
    public function performances()
    {
        return $this->belongsToMany('Performance');
    }
    
    public function events()
    {
        return $this->belongsToMany('Event');
    }
    
    public function announcements()
    {
        return $this->hasMany('Announcement');
    }
    
    public function roles()
    {
        return $this->hasMany('Role');
    }
    
    public function media()
    {
        return $this->belongsToMany('Medium');
    }
    
}
