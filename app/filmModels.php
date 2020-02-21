<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class filmModels extends Model
{
    protected $fillable = ['title', 'description', 'release_year', 'language_id', 'length', 'rating', 'special_features', 'image'];
}
