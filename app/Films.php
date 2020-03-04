<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    protected $table = 'films';
    protected $fillable = ['title', 'description', 'release_year', 'language_id', 'length', 'rating', 'special_features', 'image'];
    
}
