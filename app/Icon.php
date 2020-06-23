<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    protected $table="icon",
    $fillable=["id","icon"],
    $timestamp=false;
}
