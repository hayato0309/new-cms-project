<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    
    // protected $fillable = ['user_id', 'title', 'post_image', 'body'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    // // Mutator
    // public function setPostImageAttribute($value){

    //     $this->attribute['post_image'] = asset($value);
    // }

    // Accessor
    public function getPostImageAttribute($value){

        return asset('/storage/' . $value);
    }

    public function categories(){
        
        return $this->belongsToMany('App\Category');
    }
}
