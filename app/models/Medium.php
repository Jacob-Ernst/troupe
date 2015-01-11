<?php

class Medium extends BaseModel {
	protected $fillable = ['medium'];
    
    use SoftDeletingTrait;
    
    public function setMediumAttribute($value)
    {
        $this->attributes['medium'] = strtolower($value);
    }
    
    public function posts()
    {
        return $this->belongsToMany('User');
    }
}
