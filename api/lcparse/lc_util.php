<?php
include_once('../lc2bin/LC2B64.php');
include_once("parseLibrary.php");

$call_number = url_decode($_GET["call_number"]);

$reuslt = array();

result[] = parseToAssocArray($call_number)

include_once "LC_Converter_lib.php";
include_once "../../tagmaker/base64_lib.php";
$binret = LC2Bin($JSONin);
//echo $binret['Bin'];
if(substr($binret['Bin'],0,1) == 'E') echo json_encode(array("base64"=>$binret['Bin'])); //For debugging
else result[] = array("base64"=>bin2base64($binret['Bin']));

return json_encode(result);
?>