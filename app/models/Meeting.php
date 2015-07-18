<?php

use Carbon\Carbon;

class Meeting extends BaseModel {
	use SoftDeletingTrait;
    protected $fillable = ['production_type_id'];
    
    public static $first_rules = array(
        'title'         => 'required|max:255', 
        'type'          => 'required|max:255',
        'brief_summary' => 'required|max:255',
        'd_year'        => 'required|numeric',
        'd_month'       => 'required|numeric',
        'd_day'         => 'required|numeric'
    );
    
    public static $final_rules = array(
        'title'         => 'required|max:255', 
        'type'          => 'required|max:255',
        'brief_summary' => 'required|max:255',
        'd_year'        => 'required|numeric',
        'd_month'       => 'required|numeric',
        'd_day'         => 'required|numeric',
        'published'     => 'required|numeric|in:0,1'
    );
    
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
    
    public function production_types()
    {
        return $this->belongsTo('ProductionType');
    }
    
    public function setTypeAttribute($value)
    {
        $type = strtolower($value);
        
        $insert = ProductionType::firstOrCreate([ 'type' => $type]); 
        
        $id = $insert->id;
        
        $this->production_type_id = $id;
    }
}
