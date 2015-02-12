<?php

class Announcement extends BaseModel {
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
    
    public function user()
    {
        return $this->belongsTo('User');
    }
}
