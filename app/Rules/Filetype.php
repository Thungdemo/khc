<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Filetype implements ValidationRule
{
    const MAPPING = [
        'pdf' => 'application/pdf',
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png' => 'image/png',
        'webp' => 'image/webp',
        'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'xls' => 'application/vnd.ms-excel',
    ];

    protected array $allowedTypes;

    public function __construct(array $allowedTypes)
    {
        $this->allowedTypes = $allowedTypes;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        foreach($this->allowedTypes as $allowedType) 
        {
            if(
                $value->extension() == $allowedType &&
                $value->clientExtension() == $allowedType &&
                $value->getClientMimeType() == (static::MAPPING[$allowedType] ?? null) &&
                $value->getMimeType() == (static::MAPPING[$allowedType] ?? null)
            ){
                return;
            }
        }
        $fail('The :attribute must be a file of type: ' . implode(', ', $this->allowedTypes) . '.');
    }
}
