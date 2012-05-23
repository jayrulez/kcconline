<?php

class Util
{
	public static function shortenString($string, $length, $suspension='...')
	{
		if(strlen($string)>(int)$length)
		{
			$string = substr($string, 0, -(strlen($string)-$length)).$suspension;
		}
		return $string;
	}
}
