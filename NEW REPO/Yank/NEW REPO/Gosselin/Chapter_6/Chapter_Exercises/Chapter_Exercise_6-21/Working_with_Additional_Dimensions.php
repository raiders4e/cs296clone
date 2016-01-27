<?php
//Working with (3+) Multidimensional Arrays P. 358-359

//1) Declare individual arrays for each rows (Table 6-5, P.358)
$AlaskaForSam = array("Q1" => 874, "Q2" => 76,  "Q3" => 98,  "Q4" => 890);
$AlaskaForJane = array("Q1" => 656, "Q2" => 133, "Q3" => 64,  "Q4" => 354);
$AlaskaForLisa = array("Q1" => 465, "Q2" => 668, "Q3" => 897, "Q4" => 64 );
$AlaskaForHiroshi = array("Q1" => 31,  "Q2" => 132, "Q3" => 651, "Q4" => 46 );
$AlaskaForJose = array("Q1" => 654, "Q2" => 124, "Q3" => 126, "Q4" => 456);
/*2) Create two-dimensional arrays (For this script -- itconsists of individual arrays
    containing each salesperson's figures for that particulare state (Alaska)*/
$Alaska = array(
    "Sam" => $AlaskaForSam, "Jane" => $AlaskaForJane,
    "Lisa" => $AlaskaForLisa, "Hiroshi" => $AlaskaForHiroshi,
    "Jose" => $AlaskaForJose);

/*3) Create three-dimensional array (For this script -- .. by assigning each
    of the two-dim state arrays as elements in the three-dim array.) */
$AnnualSales["Alaska"] = $Alaska;

echo "<p>Hiroshi's third quarter sales figure for Alaska is " .
        $AnnualSales["Alaska"]["Hiroshi"]["Q3"] . "</p>";
echo "<p>Hiroshi's Fourth quarter sales figure for Alaska is " .
$AnnualSales["Alaska"]["Hiroshi"]["Q4"] . "</p>";


//Then you could continue as following:
$OregonForSam = array("Q1" => 542, "Q2" => 876,  "Q3" => 338,  "Q4" => 8900);
$OregonForJane = array("Q1" => 6756, "Q2" => 1133, "Q3" => 644,  "Q4" => 3054);
$OregonForLisa = array("Q1" => 6465, "Q2" => 6468, "Q3" => 8197, "Q4" => 604 );
$OregonForHiroshi = array("Q1" => 2310,  "Q2" => 1132, "Q3" => 6051, "Q4" => 406 );
$OregonForJose = array("Q1" => 6541, "Q2" => 1240, "Q3" => 1206, "Q4" => 4056);

$Oregon = array(
    "Sam" => $OregonForSam, "Jane" => $OregonForJane,
    "Lisa" => $OregonForLisa, "Hiroshi" => $OregonForHiroshi,
    "Jose" => $OregonForJose);  
$AnnualSales["Oregon"] = $Oregon;

echo "<p> Jose's sales figure in Oregon for Q3 is ". $AnnualSales["Oregon"]["Jose"]["Q3"];
echo "<p> Jane's sales figure in Oregon for Q3 is ". $AnnualSales["Oregon"]["Jane"]["Q3"];
echo "<p> Sam's sales figure in Oregon for Q3 is ". $AnnualSales["Oregon"]["Sam"]["Q3"];
echo "<p> Lisa's sales figure in Oregon for Q3 is ". $AnnualSales["Oregon"]["Lisa"]["Q3"];
echo "<p> Hiroshi's sales figure in Oregon for Q3 is ". $AnnualSales["Oregon"]["Hiroshi"]["Q3"];

echo "<pre>";
var_dump($AnnualSales);
echo "</pre>";
?>