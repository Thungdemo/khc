<?php

namespace App\Models;

use App\Helpers\HasPhoto;
use App\Helpers\AttributeHelper;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use AttributeHelper,HasPhoto;

    protected $guarded = [];

    protected $datable = [
        'published_at',
    ];

    static $photoPath = 'activities';

    static $photoSize = 2000;

    static $photoColumn = 'image';
}
