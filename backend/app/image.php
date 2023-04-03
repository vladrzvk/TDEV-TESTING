<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    //
    use HasFactory;
    protected $fillable = ['posted', 'image', 'lieu', 'description', 'created_at', 'id_folder'];
}
