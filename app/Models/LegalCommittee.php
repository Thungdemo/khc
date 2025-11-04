<?php

namespace App\Models;

use App\Helpers\HasPhoto;
use App\Helpers\AttributeHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalCommittee extends Model
{
    /** @use HasFactory<\Database\Factories\LegalCommitteeFactory> */
    use HasFactory, AttributeHelper, HasPhoto;

    protected $guarded = [];

    static $photoSize = 1000; // in KB

    static $photoPath = 'legal-committees';
}
