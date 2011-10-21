<?
require_once("couchSettings.php");
require_once("couchCheckParams.php");
require_once("couchDAO.php");

switch ($script){
	case "";
		require_once("couchHome.php");
	case "sci_home";
		require_once("couchHome.php");
	break;
	case "sci_alphabetic";
		require_once("couchAlphabetic.php");
	break;
	case "sci_subject";
		require_once("couchSubject.php");
	break;
	case "sci_arttext";
		require_once("couchArttext.php");	
	break;
	case "sci_serial";
		require_once("couchSerial.php");
	break;
	case "sci_abstract";
		require_once("couchAbstract.php");
	break;
	case "sci_issuetoc";
		require_once("couchIssueToc.php");	
	break;
	case "sci_issues";
		require_once("couchIssues.php");	
	break;
	case "sci_pdf";
		require_once("couchPdf.php");
	break;
	default;
	break;
}

?>