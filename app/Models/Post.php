<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    
    protected $fillable = ['title', 'message'];
    
    
    public function topic () {
        return $this->belongsTo ('App\Models\Topic', 'topicid');
        
          
 }
 public function poster () {
        return $this->belongsTo ('App\Models\Poster', 'userid');}
        
        public function comments () {
        return $this->hasMany ('App\Models\Comment', 'postid');}
}
