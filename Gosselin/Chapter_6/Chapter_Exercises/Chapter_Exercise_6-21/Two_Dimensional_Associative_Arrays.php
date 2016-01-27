<?php
// Gosselin Ch.6 Page 355
//Creating Two-Dimensional Associative Arrays
$Ounces = array("ounces" => 1, "cups" => 0.125, "pints" => 0.0625, "quarts" => 0.03125, "gallons" => 0.0078125);
$Cups = array("ounces" => 8, "cups" => 1, "pints" => 0.5, "quarts" => 0.25, "gallons" => 0.0625);
$Pints = array("ounces" => 16, "cups" => 2, "pints" => 1, "quarts" => 0.5, "gallons" => 0.125);
$Quarts = array("ounces" => 32, "cups" => 4, "pints" => 2, "quarts" => 1, "gallons" => 0.25);
$Gallons = array("ounces" => 128, "cups" => 16, "pints" => 8, "quarts" => 4, "gallons" => 1);


$VolumeConversion = array($Ounces, $Cups, $Pints, $Quarts, $Gallons);
/*Because the preceding statements does not declare keys for the elements
represented by each of the individual arrays, the first dimension in the above
two-dim array is indexed [#] to avoid confusion make both dimensions associative
assign keys to each of the array names as follows */
$VolumeConversion = array("ounces" => $Ounces, "cups" => $Cups,
                            "pints" => $Pints, "quarts" => $Quarts,
                            "gallons" => $Gallons);

echo $VolumeConversion["ounces"]["ounces"]. " ounce is equal to ". $VolumeConversion["ounces"]["pints"]. " pints.<p />";
echo $VolumeConversion["gallons"]["ounces"]. " ounces is equal to ". $VolumeConversion["gallons"]["gallons"]. " gallon.";

//Following displays how to modify two-dim array value
$VolumeConversion['pints']['quarts'] = .5;
echo $VolumeConversion["pints"]["quarts"];
echo "<pre>";
var_dump($VolumeConversion);
echo "</pre>";





/*
echo " {$Cups[$O]} ounces is equal to {$Ounces[$O]} cup<br />";
echo " {$Cups[$C]} ounces is equal to {$Ounces[$C]} cup<br />";
echo " {$Cups[$P]} ounces is equal to {$Ounces[$P]} cup<br />";
echo " {$Cups[$Q]} ounces is equal to {$Ounces[$Q]} cup<br />";
echo " {$Cups[$G]} ounces is equal to {$Ounces[$G]} cup<p />";
*/


     

?>