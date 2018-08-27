<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $guarded=[];

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function path(){
        return "/episode/{$this->course->slug}/episode/{$this->number}" ;
    }
}
