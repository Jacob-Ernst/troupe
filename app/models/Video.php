<?php

class Video extends Eloquent {
    use SoftDeletingTrait;
	protected $fillable = [];
    public function videoable()
    {
        return $this->morphTo();
    }

}
