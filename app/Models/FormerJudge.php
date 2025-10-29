<?php

namespace App\Models;

use App\Helpers\HasPhoto;
use App\Helpers\DateHelper;
use Illuminate\Support\Str;
use App\Helpers\AttributeHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormerJudge extends Model
{
    /** @use HasFactory<\Database\Factories\FormerJudgeFactory> */
    use HasFactory,AttributeHelper, HasPhoto;

    protected $guarded = [];

    protected $datable = ['start','end'];

    static $photoSize = 1000; // in KB

    static $photoPath = 'former-judges';

    public function getTenure()
    {
        return DateHelper::display($this->start) . ' - ' . DateHelper::display($this->end);
    }
}
