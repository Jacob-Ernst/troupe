<?php

class Meeting extends BaseModel {
	use SoftDeletingTrait;
    protected $fillable = [];
    
    public function images()
    {
        return $this->morphMany('Image', 'imageable');
    }
    
    public function videos()
    {
        return $this->morphMany('Video', 'videoable');
    }
    
    public function updates()
    {
        return $this->morphMany('Update', 'updateable');
    }
    
    public function users()
    {
        return $this->belongsToMany('User');
    }
    
    public function roles()
    {
        return $this->belongsToMany('Role');
    }
}
