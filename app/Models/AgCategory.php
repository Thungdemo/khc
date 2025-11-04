<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgCategory extends Model
{
    protected $guarded = [];

    public function advocateGenerals()
    {
        return $this->hasMany(AdvocateGeneral::class);
    }
}
