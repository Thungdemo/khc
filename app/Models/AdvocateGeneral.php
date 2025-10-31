<?php

namespace App\Models;

use App\Helpers\AttributeHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdvocateGeneral extends Model
{
    /** @use HasFactory<\Database\Factories\AdvocateGeneralFactory> */
    use HasFactory,AttributeHelper;
    protected $guarded = [];

    protected $datable = [
        'doj',
        'served_till',
    ];

    public function agCategory()
    {
        return $this->belongsTo(AgCategory::class);
    }
}
