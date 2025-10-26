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

        if($this->isDaterangeable($key))
        {
            unset($this->attributes[$key]);
            if($value) {
                [$start,$end] = explode(config('schoolbook.daterange.separator'),$value);
                if($start && $end){
                    $this->attributes[$key.'_start'] = Carbon::parse($start);
                    $this->attributes[$key.'_end'] = Carbon::parse($end);
                }
            }
            
        }

        if($this->isUppercasable($key))
        {
            $this->attributes[$key] = $value!==null ? mb_strtoupper($value) : null;
        }

        if($this->isHashable($key))
        {
            $this->attributes[$key.'_hash'] = $value!==null ? hash($this->hash,$value) : null;
        }

    	if($this->isEncryptable($key))
    	{
    		$this->attributes[$key] = $value!==null ? encrypt($value) : null;
    	}
    	return $this;
    }

    protected function isEncryptable($key)
    {
    	return in_array($key,$this->encryptable ?? []);
    }

    protected function isDatable($key)
    {
        return in_array($key,$this->datable ?? []);
    }

    protected function isDatetimeable($key)
    {
        return in_array($key,$this->datetimeable ?? []);
    }

    protected function isDaterangeable($key)
    {
        return in_array($key,$this->daterangeable ?? []);
    }

    protected function isUppercasable($key)
    {
        return in_array($key,$this->uppercasable ?? []);
    }

    protected function isHashable($key)
    {
        return in_array($key,$this->hashable ?? []);
    }

    protected function isMaksable($key)
    {
        return array_key_exists($key,$this->maskable??[]) && $this[$key];
    }

    public function getAttributeValue($key)
    {
    	$value = parent::getAttributeValue($key);

    	if($this->isEncryptable($key))
    	{
    		try {
    			$value = decrypt($value);
    		} catch(DecryptException $e) {}
    	}

        if($this->isDatable($key)) {
            $value = $value ? DateHelper::date($value) : null;
        }

        if($this->isDatetimeable($key)) {
            $value = $value ? DateHelper::datetime($value) : null;
        }

    	return $value;
    }

    public function masked($key)
    {
        if($this->isMaksable($key))
        {
            $value = $this->{$key};
            $options = explode(':',$this->maskable[$key]);
            $type = strtolower($options[0]);
            switch($type){
                case 'email':
                    [$username,$domain] = explode('@',$value);
                    return $this->maskValue($username).'@'.$domain;
                case 'phone':
                    $length = 6;
                case 'length': 
                    $length = $options[1] ?? null;
                default:
                    return $this->maskValue($value,$length);
            }
        }
    }

    protected function maskValue($value,$length=null)
    {
        $length = $length ?? ceil(0.6*strlen($value));
        return str_repeat('*',$length).substr($value,$length);
    }

    public function scopeWhereHash($query,$column,$value)
    {
        $query->where($column,hash($this->hash,$value));
    }
}