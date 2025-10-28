<?php

namespace App\Models;

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

    static $maxPhotoSize = 1000; // in KB

    static $photoPath = 'former-judges';

    public function savePhoto($file)
    {
        $filename = Str::random(10) . '.' . $file->guessExtension();
        $file->storeAs(self::$photoPath, $filename, 'public');
        $this->forceFill(([
            'photo' => self::$photoPath . '/' . $filename,
        ]))->save();
    }

    public function photoUrl()
    {
        return $this->photo ? asset('storage/' . $this->photo) : null;
    }

    public function deletePhoto()
    {
        Storage::disk('public')->delete($this->photo);
        $this->forceFill([
            'photo' => null,
        ])->save();
    }

    public function delete()
    {
        $this->deletePhoto();
        parent::delete();
    }
}
