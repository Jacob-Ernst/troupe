<?php

class Pitch extends Eloquent {
    use SoftDeletingTrait;
	protected $fillable = [];
    
    public function user()
    {
        return $this->belongsTo('User');
    }
}
