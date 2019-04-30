<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    public function employee()
    {
        return $this->hasOne('App\Employee');
    }
}
