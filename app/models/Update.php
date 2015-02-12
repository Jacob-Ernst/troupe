<?php

class Update extends Eloquent {
    use SoftDeletingTrait;
	protected $fillable = [];
    
    public function updateable()
    {
        return $this->morphTo();
    }

}
