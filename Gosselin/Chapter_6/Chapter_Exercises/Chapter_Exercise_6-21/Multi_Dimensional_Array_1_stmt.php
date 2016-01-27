<?php 
//Creating Multidimensional Arrays with a Single Statement P. 356
//Note array(array(),array())...; 
$VolumeConversions = array(
    array(1, 0.125, 0.0625, 0.03125, 0.0078125), // Ounces
    array(8, 1, 0.5, 0.25, 0.125),  //Cups
    array(16, 2, 1, 0.5, 0.125),    // Pints
    array(32, 4, 2, 1, 0.25),       // Quarts
    array(128, 16, 8, 4, 1)         //Gallons
    );
echo "Listing of \"VolumeConversions[]\" Multidimensional Indexed array:<br />";
echo "<pre>";
var_dump($VolumeConversions);
echo "</pre>";

//How to create a Multidimensional Array with a single Statement P.357
$VolumeConversionsAssc = array(
    array("ounces" => 1,   "cups" => .125, "pints" => .0625, "quarts" => .03125, "gallons" => .0078125), // Ounces
    array("ounces" => 8,   "cups" => 1,     "pints" => .5,   "quarts" => .25,    "gallons" => .125),    //Cups
    array("ounces" => 16,  "cups" => 2,     "pints" => 1,    "quarts" => .5,     "gallons" => .125),    // Pints
    array("ounces" => 32,  "cups" => 4,     "pints" => 2,    "quarts" => 1,      "gallons" => .25),     // Quarts
    array("ounces" => 128, "cups" => 16,    "pints" => 8,    "quarts" => 4,      "gallons" => 1)        //Gallons
    );    
echo "Listing of \"VolumeConversionsAssc[]\" Multidimensional Associative array:<br />";
echo "<pre>";
var_dump($VolumeConversionsAssc);
echo "</pre>";   

?>