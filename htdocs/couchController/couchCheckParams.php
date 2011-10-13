<?
# TESTING LANGUAGE LNG
if ($_REQUEST["lng"] == ""){
   $lng = $conf["SITE_INFO"]["STANDARD_LANG"];
}else{
  $lng = $_REQUEST["lng"];
}

# TESTING LANGUAGE SLN
if ($_REQUEST["sln"] == ""){
   $sln = $conf["SITE_INFO"]["STANDARD_LANG"];
}else{
  $lng = $_REQUEST["sln"];
}

# TESTING SCRIPTS
$script = $_REQUEST["script"];

# TESTING PID
$pid = $_REQUEST["pid"];
?>