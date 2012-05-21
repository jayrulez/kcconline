<?php
class Country
{
	public $code;
	public $name;
	
	public function __construct()
	{
		Application::dbConnect();	
	}
	
	public function getAll()
	{
		$resultPointer = mysqli_query(Application::$dbLink,'select * from country');
		$result = array();
		if($resultPointer)
		{
			while($resultRow = mysqli_fetch_array($resultPointer))
			{
				array_push($result,$resultRow);
			}		
		}
		return $result;
	}
}

?>