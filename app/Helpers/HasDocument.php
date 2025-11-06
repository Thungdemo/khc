<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

trait HasDocument
{
    public function generateFilename($extension)
    {
        return uniqid() .'.'. $extension;
    }

    public function resolveSavePath()
    {
        return preg_replace_callback('/\{(\w+)\}/', function($matches) {
            return $this[$matches[1]];
        }, static::$documentPath);
    }

    public function saveDocument($file)
    {
        $filename = $this->generateFilename($file->guessExtension());

        $documentPath = $this->resolveSavePath();

        $file->storeAs($documentPath, $filename, 'public');
        $this->forceFill(([
            static::$documentColumn => $documentPath . '/' . $filename,
        ]))->save();
    }

    public function documentUrl()
    {
        return asset('storage/' . $this[static::$documentColumn]);
    }

    public function documentFilename()
    {
        return basename($this[static::$documentColumn]);
    }

    public function documentDelete()
    {
        if($this[static::$documentColumn])
        {
            Storage::disk('public')->delete($this[static::$documentColumn]);
            $this->forceFill(([
                static::$documentColumn => null,
            ]))->save();
        }
    }

    public function delete()
    {
        $this->documentDelete();
        parent::delete();
    }
}