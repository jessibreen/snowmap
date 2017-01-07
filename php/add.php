<?php
include '/var/www/cartodbProxy.php';
//include '../../../../apis/cartodbProxy.php';
//			^CHANGE THIS TO THE PATH TO YOUR cartodbProxy.php


//testing
// table:cartodb_snow
// coords:[-84.61395263671875,38.043765107439675],[-84.46357727050781,38.07133872299575],[-84.35234069824217,37.97451499202459],[-84.32762145996094,38.004819966413194],[-84.6140,38.0438]
// city:Lexington
// description:kdfghakjsdhf
// name:sdkfshdf
// cityYears:1
// hoodYears:1
// cache:false
// timeStamp:1483801325811

$_POST['table'] = "cartodb_snow";
$_POST['ext'] = "";
$_POST['coords'] = "[-84.61395263671875,38.043765107439675],[-84.46357727050781,38.07133872299575],[-84.35234069824217,37.97451499202459],[-84.32762145996094,38.004819966413194],[-84.6140,38.0438]";
$_POST['city'] = "Lexington";
$_POST['description'] = "kdfghakjsdhf";
$_POST['name'] = "foo";
$_POST['cityYears'] = "1";
$_POST['hoodYears'] = "1";
$_POST['cache'] = "false";
$_POST['timeStamp'] = "1483801325811";



$q = "INSERT INTO " . $_POST['table'] . " (the_geom, city, description, name,city_yrs,nbrhd_yrs,flag,loved) VALUES (ST_SetSRID(ST_GeomFromGeoJSON('";
if ( $_POST['ext'] != "_point" ){
  $q .= '{"type":"LineString","coordinates":[[[' . $_POST['coords'] . "]]]}'";
} else {
  $q .= '{"type":"Point","coordinates":' . $_POST['coords'] . "}'";
}
$q .= "),4326),'". $_POST['city'] ."','" . $_POST['description'] . "','" . $_POST['name'] . "','" . $_POST['cityYears'] . "','" . $_POST['hoodYears'] . "','false','0')";

print $q . "<br/>";
$return = goProxy($q);
echo $return;
?>
