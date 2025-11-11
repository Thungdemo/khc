<?php

namespace App\Models;

use App\Helpers\HasDocument;
use App\Helpers\AttributeHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormDownload extends Model
{
    /** @use HasFactory<\Database\Factories\FormDownloadFactory> */
    use HasFactory, AttributeHelper, HasDocument;

    protected $guarded = [];

    public static $documentPath = 'form-downloads/{id}';

    public static $documentMaxSize = 10000; // 10MB for forms

    public static $documentColumn = 'filename';

    public function scopeFilter($query, $request)
    {
        if ($request->title) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        return $query;
    }

    public function scopeNewest($query)
    {
        $query->orderBy('created_at', 'desc');
    }

    public function documentSize()
    {
        if (!$this->filename) {
            return null;
        }

        $filePath = storage_path('app/public/' . $this->filename);
        
        if (!file_exists($filePath)) {
            return null;
        }

        $bytes = filesize($filePath);
        
        if ($bytes < 1024) {
            return $bytes . ' B';
        } elseif ($bytes < 1048576) {
            return round($bytes / 1024, 2) . ' KB';
        } else {
            return round($bytes / 1048576, 2) . ' MB';
        }
    }

    public function delete()
    {
        $this->documentDelete();
        parent::delete();
    }
}
