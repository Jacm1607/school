<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitEmoji extends Model
{
    protected $table="bitemoji",
    $fillable=['id','nombre'];
    public $timestamps=false;
}
