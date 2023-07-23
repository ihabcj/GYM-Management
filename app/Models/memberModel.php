<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class memberModel extends Model
{
    use HasFactory;

    public function mytrainer(){
        return $this->hasMany('App\Models\trainerModel','id','Trainer_id');
    }
}
