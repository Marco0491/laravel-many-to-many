<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = array('user_id', 'title', 'content', 'image_url');
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
