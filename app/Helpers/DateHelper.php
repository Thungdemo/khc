<?php

namespace App\Helpers;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;

class DateHelper
{
	public static function format($date)
	{
		if(!static::hasTime($date))
		{
			return static::date($date);
		}
		return static::datetime($date);
	}	

	public static function date($date)
	{
		return static::_format($date,config('khc.date_format'));
	}

	public static function time($date)
	{
		return static::_format($date,config('khc.time_format'));
	}

	public static function datetime($date)
	{
		return static::_format($date,config('khc.date_format').' '.config('khc.time_format'));
	}

	public static function hasTime($date)
	{
		return preg_match('/[0-9]{1,2}:[0-9]{1,2}:[0-9]{1,2}/',$date);
	}

	protected static function _format($date,$format)
	{
		if($date==null) return $date;
		try 
		{
			return Carbon::parse($date)->format($format);
		} 
		catch (InvalidFormatException $e) 
		{
			return $date;
		}
	}
}