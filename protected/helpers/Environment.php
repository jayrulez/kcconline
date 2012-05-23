<?php

class Environment
{
	public static function getParam($name, $defaultValue=null)
	{
		return isset(Yii::app()->params[$name]) ? Yii::app()->params[$name] : $defaultValue;
	}

	public static function getNumberSequence($start, $end)
	{
		$numbers = array();

		if(is_numeric($start) && is_numeric($end))
		{
			if($start >= $end)
			{
				for($counter = $end; $counter > $start; $counter--)
				{
					$numbers[$counter] = $counter;
				}
			}else{
				for($counter = $start; $counter < $end; $counter++)
				{
					$numbers[$counter] = $counter;
				}
			}
		}

		return $numbers;
	}

	public static function getYearOptions($startYear = 1950, $endYear = 2011)
	{
		return self::getNumberSequence($startYear, $endYear);
	}

	public static function getMonthOptions($width = 'abbreviated')
	{
		return Yii::app()->getLocale()->getMonthNames($width);
	}

	public static function getDayOptions($startDay = 1, $endDay = 31)
	{
		return self::getNumberSequence($startDay, $endDay);
	}

	public static function generateCode($length = 32)
	{
		return substr(md5(time()), 0, $length);
	}
}
