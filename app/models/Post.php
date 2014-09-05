<?php

class Post extends Eloquent {

    public function categories() {
        return $this->belongsToMany('Category');
    }
}