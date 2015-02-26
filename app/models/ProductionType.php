<?php

class ProductionType extends BaseModel {
	protected $fillable = ['type'];
    
    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = strtolower($value);
    }
    
    public function performances()
    {
        return $this->hasMany('Performance');
    }
    
    public function meetings()
    {
        return $this->hasMany('Meeting');
    }
}
