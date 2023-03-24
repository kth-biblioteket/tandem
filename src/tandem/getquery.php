<?php 

function getQuery($Cyear, $Cmonth){ 

	
	
	if($Cmonth > 4)
	{
		$year = $Cyear - 0 ;
		$month1 = $Cmonth - 0 ;
		$month2 = $Cmonth - 1;
		$month3 = $Cmonth - 2 ;
		$month4 = $Cmonth - 3 ;
		$month5 = $Cmonth - 4 ;
		
		$sql = "  (
		loginyear =$year AND (loginmonth = $month1 OR loginmonth =$month2 OR loginmonth =$month3 OR loginmonth =$month4 OR loginmonth =$month5) 
		)" ;
	
	}
	else 
	{
		$year =  $Cyear - 0 ;
		$year2 = $Cyear - 1 ;
		
		switch ($Cmonth)
		{
			case 4:
				$month1 = $Cmonth ;
				$month2 = $Cmonth - 1;
				$month3 = $Cmonth - 2 ;
				$month4 = $Cmonth - 3 ;
				$month5 = 12 ;
				$sql = " (
				 (loginyear =$year AND (loginmonth = $month1 OR loginmonth =$month2 OR loginmonth =$month3 OR loginmonth =$month4 ) )
						OR (loginyear =$year2 AND (loginmonth =$month5))
				)" ;
				break ;
			
			case 3:
				$month1 = $Cmonth ;
				$month2 = $Cmonth - 1;
				$month3 = $Cmonth - 2 ;
				$month4 = 12 ;
				$month5 = 11 ;
				$sql = "  (
							(loginyear =$year AND (loginmonth = $month1 OR loginmonth =$month2 OR loginmonth =$month3  ) )
						OR (loginyear =$year2 AND (loginmonth =$month5 OR loginmonth =$month4))
							)" ;
				break ;
			
			case 2:
				$month1 = $Cmonth ;
				$month2 = $Cmonth - 1;
				$month3 = 12 ;
				$month4 = 11 ;
				$month5 = 10 ;
				$sql = "  (
						(loginyear =$year AND (loginmonth = $month1 OR loginmonth =$month2 ) )
						OR (loginyear =$year2 AND (loginmonth =$month5  OR loginmonth =$month3 OR loginmonth =$month4))
							)" ;
				break ;
			
			case 1:
				$month1 = $Cmonth ;
				$month2 = 12;
				$month3 = 11 ;
				$month4 = 10 ;
				$month5 = 9 ;
				$sql = "  (
						(loginyear =$year AND (loginmonth = $month1) )
						OR (loginyear =$year2 AND (loginmonth =$month5 OR loginmonth =$month2 OR loginmonth =$month3 OR loginmonth =$month4 ))
				)" ;
				break ;
		}
	}
	
	return $sql ;
}


?>