<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    use HasFactory;
    
    protected $fillable = ['username', 'email', 'birthdate'];

    
    public function posts () {
        return $this->hasMany ('App\Models\Post', 'userid');
 }
 public function comments () {
        return $this->hasMany ('App\Models\Comment', 'userid');
 }
}
