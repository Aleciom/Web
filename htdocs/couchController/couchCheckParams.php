<?
# TESTING LANGUAGE LNG
if (empty($_REQUEST["lng"])){
  $lng = $conf["SITE_INFO"]["STANDARD_LANG"];
}else{
  $lng = $_REQUEST["lng"];
}

# TESTING LANGUAGE TLNG
if ($_REQUEST["tlng"] == ""){
  $tlng = $conf["SITE_INFO"]["STANDARD_LANG"];
}else{
  $tlng = $_REQUEST["tlng"];
}

# TESTING LANGUAGE SLN
if ($_REQUEST["sln"] == ""){
  $sln = $conf["SITE_INFO"]["STANDARD_LANG"];
}else{
  $sln = $_REQUEST["sln"];
}

# TESTING SCRIPTS
$script = $_REQUEST["script"];

# TESTING PID
$pid = $_REQUEST["pid"];
?>