<?php

namespace App\Models;

use App\Helpers\DateHelper;
use Illuminate\Support\Str;
use App\Helpers\AttributeHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormerJudge extends Model
{
    /** @use HasFactory<\Database\Factories\FormerJudgeFactory> */
    use HasFactory,AttributeHelper;

    protected $guarded = [];

    protected $datable = ['start','end'];

    static $maxFileSize = 1000; // in KB

    static $filePath = 'former-judges';

    public function savePhoto($file)
    {
        $filename = Str::random(10) . '.' . $file->guessExtension();
        $file->storeAs(self::$filePath, $filename, 'public');
        $this->forceFill(([
            'photo' => self::$filePath . '/' . $filename,
        ]))->save();
    }

    public function photoUrl()
    {
        return $this->photo ? asset('storage/' . $this->photo) : null;
    }

    public function deletePhoto()
    {
        if($this->photo)
        {
            Storage::disk('public')->delete($this->photo);
            $this->forceFill([
                'photo' => null,
            ])->save();
        }
    }

    public function delete()
    {
        $this->deletePhoto();
        parent::delete();
    }

    public function getTenure()
    {
        return DateHelper::display($this->start) . ' - ' . DateHelper::display($this->end);
    }
}
