<?php

class Image extends Eloquent {
    use SoftDeletingTrait;    
	protected $fillable = [];
    
    public function imageable()
    {
        return $this->morphTo();
    }

}
