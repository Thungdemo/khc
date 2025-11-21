<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Helpers\HasDocument;
use App\Helpers\AttributeHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notice extends Model
{
    use HasFactory,AttributeHelper,HasDocument;

    const FILTER_PUBLISHED = 'published';
    const FILTER_SCHEDULED = 'scheduled';

    const FILTER_STATUSES = [
        Notice::FILTER_PUBLISHED => 'Published',
        Notice::FILTER_SCHEDULED => 'Scheduled',
    ];

    protected $datetimeable = ['published_at'];

    protected $guarded = [];

    public static $documentPath = 'notice/{id}';

    public static $documentMaxSize = 5000;

    public static $documentColumn = 'filename';

    public function scopeFilter($query, $request)
    {
        if ($request->notice_category_id) {
            $query->where('notice_category_id', $request->notice_category_id);
        }

        if ($request->notice_subcategory_id) {
            $query->where('notice_subcategory_id', $request->notice_subcategory_id);
        }

        if ($request->title) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->status) {
            if ($request->status == Notice::FILTER_PUBLISHED) 
            {
                $query->where('published_at', '<=', now()->toDatetimeString());
            }

            if($request->status == Notice::FILTER_SCHEDULED) 
            {
                $query->where(function ($q) {
                    $q->whereNull('published_at')
                      ->orWhere('published_at', '>', now()->toDatetimeString());
                });
            }
        }

        return $query;
    }

    public function noticeCategory()
    {
        return $this->belongsTo(NoticeCategory::class);
    }

    public function noticeSubcategory()
    {
        return $this->belongsTo(NoticeCategory::class, 'notice_subcategory_id');
    }

    public function noticeChildren()
    {
        return $this->hasMany(NoticeChild::class);
    }

    public function scopePublished($query)
    {
        $query->where('published_at','<=',now()->toDatetimeString());
    }

    public function scopeNewest($query)
    {
        $query->orderBy('published_at','desc');
    }

    public function isPublished()
    {
        return $this->published_at && Carbon::parse($this->published_at)->lessThanOrEqualTo(now());
    }

    public function delete()
    {
        foreach($this->noticeChildren as $child)
        {
            $child->delete();
        }
        $this->documentDelete();
        parent::delete();
    }

    public function isRecentlyPublished()
    {
        return $this->published_at && Carbon::parse($this->published_at)->greaterThanOrEqualTo(now()->subDays(14));
    }

    public function noticeType()
    {
        return $this->url ? 'url' : 'file';
    }

    public function noticeUrl()
    {
        if ($this->noticeType() == 'url') {
            return $this->url;
        }
        return $this->documentUrl();
    }
}
