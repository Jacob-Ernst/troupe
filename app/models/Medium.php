<?php

class Medium extends BaseModel {
	protected $fillable = ['medium'];
    
    use SoftDeletingTrait;
    
    public function setMediumAttribute($value)
    {
        $this->attributes['medium'] = strtolower($value);
    }
    
    public function users()
    {
        return $this->belongsToMany('User');
    }
}
