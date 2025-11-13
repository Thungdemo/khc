<?php

namespace App\Models;

use App\Helpers\HasPhoto;
use App\Helpers\AttributeHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegistryOfficial extends Model
{
    /** @use HasFactory<\Database\Factories\RegistryOfficialFactory> */
    use HasFactory,AttributeHelper,HasPhoto;

    static $photoSize = 1000; // in KB

    static $photoPath = 'registry-officials';

    protected $guarded = [];

    protected $datable = ['dob'];
}
