<?php

namespace App\Helpers;

use App\Helpers\DateHelper;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;

trait AttributeHelper {
    protected $hash = 'sha512';

	public function setAttribute($key, $value)
    {
    	parent::setAttribute($key,$value);

        if($this->isDatable($key))
        {
            $this->attributes[$key] = $value!==null ? Carbon::parse($value)->toDateString() : null;
        }

        if($this->isDatetimeable($key))
        {
            $this->attributes[$key] = $value!==null ? Carbon::parse($value)->toDateTimeString() : null;
        }
    	return $this;
    }

    protected function isDatable($key)
    {
        return in_array($key,$this->datable ?? []);
    }

    protected function isDatetimeable($key)
    {
        return in_array($key,$this->datetimeable ?? []);
    }

    public function getAttributeValue($key)
    {
    	$value = parent::getAttributeValue($key);

        if($this->isDatable($key)) {
            $value = $value ? DateHelper::date($value) : null;
        }

        if($this->isDatetimeable($key)) {
            $value = $value ? DateHelper::datetime($value) : null;
        }

    	return $value;
    }
}