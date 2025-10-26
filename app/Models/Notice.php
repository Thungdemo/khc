<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Helpers\AttributeHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notice extends Model
{
    /** @use HasFactory<\Database\Factories\NoticeFactory> */
    use HasFactory,AttributeHelper;

    static $documentPath = 'notices';

    protected $datetimeable = ['published_at'];

    protected $guarded = [];

    public function scopeFilter($query, $request)
    {
        if ($request->category) {
            $query->where('notice_category_id', $request->notice_category_id);
        }

        if ($request->title) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        return $query;
    }

    public function saveDocument($file)
    {
        $filename = Str::random(10) .'.'. $file->getClientOriginalExtension();
        $file->storeAs(self::$documentPath, $filename, 'public');
        $this->forceFill(([
            'filename' => self::$documentPath . '/' . $filename,
        ]))->save();
    }

    public function documentUrl()
    {
        return asset('storage/' . $this->filename);
    }

    public function documentFilename()
    {
        return basename($this->filename);
    }

    public function documentDelete()
    {
        Storage::disk('public')->delete($this->filename);
        $this->forceFill(([
            'filename' => null,
        ]))->save();
    }

    public function delete()
    {
        $this->documentDelete();
        parent::delete();
    }

    public function noticeCategory()
    {
        return $this->belongsTo(NoticeCategory::class);
    }
}
