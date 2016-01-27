<?php
// Gosselin Ch.6 Page 351
//Creating Two-Dimensional Indexed Arrays
$Ounces = array(
    1, // ounces
    .125, // cups
    .0625, // pints
    .03125, // quarts
    .0078125); // gallons
$Cups = array(
    8, // ounces
    1, // cups
    .5, // pints
    .25, // quarts
    .0625); // gallons
$Pints = array(
    16, // ounces
    2, // cups
    1, // pints
    .5, //quarts
    .125); // gallons
    
$Quarts = array(
    32, // ounces
    4, // cups
    2, // pints
    1, // quarts
    .25); // gallons
$Gallons = array(
    128, // ounces
    16, // cups
    8, // pints
    4, // quarts
    1); // gallons
/*
_____________________________________________________________________________
                0 (Ounces)  1 (Cups)    2 (Pints)   3 (Quarts)  4 (Gallons)
0 (Ounces)          1          .125         .0625      .03125      .0078125  
1 (Cups)            8           1           .5         .25         .0625
2 (Pints)           16          2            1         .5          .125
3 (Quarts)          32          4            2          1          .25
4 (Gallons)         128         16           8          4           1
*/

/* 
The following statement uses each of the precceding array names to declare and initialize a two-dim array
indexed arrray named $VolumeConversions[]:
*/
$VolumeConversions = array($Ounces, $Cups, $Pints, $Quarts, $Gallons);

echo "{$VolumeConversions[4][4]} gallon converts to ".$VolumeConversions[4][0]. " ounces.<br />";
echo "{$VolumeConversions[4][1]} cups converts to ". $VolumeConversions[2][1]. " pints.<br />";
echo "{$VolumeConversions[3][0]} ounces converts to ". $VolumeConversions[3][3]. " quart.<br />";




     

?>