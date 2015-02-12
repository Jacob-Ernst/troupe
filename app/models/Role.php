<?php

class Role extends BaseModel {
    use SoftDeletingTrait;
	protected $fillable = [];
    
    public function setRoleAttribute($value)
    {
        $this->attributes['role'] = strtolower($value);
    }
    
    
    public function events()
    {
        return $this->belongsToMany('Event');
    }
    
    public function performances()
    {
        return $this->belongsToMany('Performance');
    }
    
    public function users()
    {
        return $this->belongsToMany('User');
    }
}
