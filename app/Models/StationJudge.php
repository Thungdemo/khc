<?php

namespace App\Models;

use App\Helpers\HasPhoto;
use App\Helpers\AttributeHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StationJudge extends Model
{
    /** @use HasFactory<\Database\Factories\StationJudgeFactory> */
    use HasFactory,HasPhoto,AttributeHelper;

    protected $guarded = [];

    protected $datable = ['dob','elevation_date'];

    static $photoSize = 1000; // in KB

    static $photoPath = 'station-judges';
}
