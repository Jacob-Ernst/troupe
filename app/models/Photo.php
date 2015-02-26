<?php

class Photo extends Eloquent {
    use SoftDeletingTrait;    
    protected $fillable = [];
    
    public function photoable()
    {
        return $this->morphTo();
    }

}
