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
		$resultPointer = Application::$dbConnection->query('select * from country');
		$result = array();
		if($resultPointer)
		{
			while($resultRow = $resultPointer->fetch_assoc())
			{
				array_push($result,$resultRow);
			}		
		}
		return $result;
	}
}

?>