<?php
$letter = $_GET['letter'] ;
Switch ($letter)
{
	case 'a':
		$smallLetter = $letter ;
		$capitalLetter = 'A' ;
		break ;
	
		case 'b':
		$smallLetter = $letter ;
		$capitalLetter = 'B' ;
		break ;
	
	case 'c':
		$smallLetter = $letter ;
		$capitalLetter = 'C' ;
		break ;
	
	case 'd':
		$smallLetter = $letter ;
		$capitalLetter = 'D' ;
		break ;
	
	case 'e':
		$smallLetter = $letter ;
		$capitalLetter = 'E' ;
		break ;
	
	case 'f':
		$smallLetter = $letter ;
		$capitalLetter = 'F' ;
		break ;
	
	case 'g':
		$smallLetter = $letter ;
		$capitalLetter = 'G' ;
		break ;
	
	case 'h':
		$smallLetter = $letter ;
		$capitalLetter = 'H' ;
		break ;
	
	case 'i':
		$smallLetter = $letter ;
		$capitalLetter = 'I' ;
		break ;

	case 'j':
		$smallLetter = $letter ;
		$capitalLetter = 'J' ;
		break ;
	
	case 'k':
		$smallLetter = $letter ;
		$capitalLetter = 'K' ;
		break ;
	
	case 'l':
		$smallLetter = $letter ;
		$capitalLetter = 'L' ;
		break ;

	case 'm':
		$smallLetter = $letter ;
		$capitalLetter = 'M' ;
		break ;
	
	case 'n':
		$smallLetter = $letter ;
		$capitalLetter = 'N' ;
		break ;

	case 'o':
		$smallLetter = $letter ;
		$capitalLetter = 'O' ;
		break ;

	case 'p':
		$smallLetter = $letter ;
		$capitalLetter = 'P' ;
		break ;

	case 'q':
		$smallLetter = $letter ;
		$capitalLetter = 'Q' ;
		break ;

	case 'r':
		$smallLetter = $letter ;
		$capitalLetter = 'R' ;
		break ;						

	case 's':
		$smallLetter = $letter ;
		$capitalLetter = 'S' ;
		break ;

	case 't':
		$smallLetter = $letter ;
		$capitalLetter = 'T' ;
		break ;

	case 'u':
		$smallLetter = $letter ;
		$capitalLetter = 'U' ;
		break ;

	case 'v':
		$smallLetter = $letter ;
		$capitalLetter = 'V' ;
		break ;

	case 'w':
		$smallLetter = $letter ;
		$capitalLetter = 'W' ;
		break ;
		
	case 'x':
		$smallLetter = $letter ;
		$capitalLetter = 'X' ;
		break ;

	case 'y':
		$smallLetter = $letter ;
		$capitalLetter = 'Y' ;
		break ;

	case 'z':
		$smallLetter = $letter ;
		$capitalLetter = 'Z' ;
		break ;

	case 'A2':
		$smallLetter = '&auml;' ;
		$capitalLetter = '&Auml;' ;
		break ;
		
	case 'A1':
		$smallLetter = '&aring;' ;
		$capitalLetter = '&Aring;' ;
		break ;

	case 'O2':
		$smallLetter = '&ouml;' ;
		$capitalLetter = '&Ouml;' ;
		break ;
		
 
}
//die($smallLetter) ;
header("location: http://www.kth.se/ece/avdelningen-for-larande/sprak-och-kommunikation/tandem/admin/membersdet.php?smallLetter=$smallLetter&capitalLetter=$capitalLetter") ;

?>