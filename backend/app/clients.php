<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    //
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'email','password'];

}
