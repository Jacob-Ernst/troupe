<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Carbon\Carbon;

class User extends BaseModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	
	use SoftDeletingTrait;
    
    protected $dates = ['deleted_at'];
    
    public static $rules = array(
        'email'          => 'required|max:200|email|unique:users', 
        'first_password' => 'required|max:255|min:6',
        'last_password'  => 'required|max:255|min:6|same:first_password',
        'first_name'     => 'required|max:255',
        'last_name'      => 'required|max:255',
        'gender'         => 'required|in:m,f,o,p',
        'type'           => 'required|in:director,actor,writer,artist',
        'b_year'         => 'required|numeric',
        'b_month'        => 'required|numeric',
        'b_date'         => 'required|numeric'
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
    
    public function setMediaAttribute($value)
    {
        $media = explode(',', $value);
        
        $mediumIds = [];
        
        foreach($media as $medium)
        { 
            $insert = Medium::firstOrCreate([ 'medium' => $medium]); 
            $mediumIds[] = $insert->id; 
        }
        $this->media()->sync($mediumIds);
    }
    
    public function getDateOfBirthAttribute($value)
    {  
        $utc = Carbon::createFromFormat('Y-m-d', $value);
        return $utc->setTimezone('America/Chicago');
    }
    
    public function getGenderAttribute($value)
    {  
        if ($value == 'm') {
            return 'male';
        }
        elseif ($value == 'f') {
            return 'female';
        }
        elseif ($value == 'o') {
            return 'other';
        }
        elseif ($value == 'p') {
            return 'not given';
        }
    }
}
