<?php

namespace App\Models;

use App\Helpers\AttributeHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegistryOfficial extends Model
{
    /** @use HasFactory<\Database\Factories\RegistryOfficialFactory> */
    use HasFactory,AttributeHelper;

    protected $guarded = [];

    protected $datable = ['dob'];
}
