<?
require_once("couchCheckParams.php");
require_once("couchSettings.php");
switch ($script){
	case "";
		require_once("couchHome.php");
	case "sci_home";
		require_once("couchHome.php");
	break;
	case "sci_alphabetic";
		require_once("couchAlphabetic.php");
	break;
	case "sci_arttext";
	break;
	case "sci_serial";
		require_once("couchSerial.php");
	break;
	case "sci_abstract";
	break;
	case "sci_issues";
	break;
	case "sci_pdf";
	break;
	default;
	break;
}

?>