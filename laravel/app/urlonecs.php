<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class urlonecs extends Model
{
    protected $fillable = ['link','content','viewleft','valid','ip'];
}
