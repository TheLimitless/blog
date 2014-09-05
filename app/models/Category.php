<?php

class Category extends Eloquent {

    public $timestamps = false;

    public function posts() {
        return $this->belongsToMany('Post');
    }
}