<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = ['message'];
    
    
     public function post () {
        return $this->belongsTo ('App\Models\Post', 'postid');
        
          
 }  public function poster () {
        return $this->belongsTo ('App\Models\Poster', 'userid');
        
          
 }
}
