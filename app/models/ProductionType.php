<?php

class ProductionType extends BaseModel {
	protected $fillable = [];
    
    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = strtolower($value);
    }
    
    public function performances()
    {
        return $this->hasMany('Performance');
    }
}
