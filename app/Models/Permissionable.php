<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissionable extends Model
{
    use HasFactory;

    public function permissionable()
    {
        return $this->morphTo();
    }
}
