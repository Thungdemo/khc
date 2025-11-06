<?php

namespace App\Models;

use App\Helpers\HasDocument;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NoticeChild extends Model
{
    /** @use HasFactory<\Database\Factories\NoticeChildFactory> */
    use HasFactory,HasDocument;

    protected $guarded = [];

    public static $documentPath = 'notices/{notice_id}';

    public static $documentMaxSize = 5000;

    public static $documentColumn = 'filename';
}
