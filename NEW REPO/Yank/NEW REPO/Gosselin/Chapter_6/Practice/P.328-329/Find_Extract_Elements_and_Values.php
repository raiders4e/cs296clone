<h1>Using custom foreach and if statements function to search array</h1>
<?php
//Finding and Extracting Elements and Values from an Array

// Gosselin Ch. 6 Page 328  
$HospitalDepts = array(
    "Anestheisa", "Molecular Biology",
    "Neurology", "Pediatrics");

foreach($HospitalDepts as $Departments) {
     if ($Departments == "Neurology") {
         echo "<p>This hospital has a Neurology Department</p>";
     }
     if ($Departments == "Molecular Biology") {
         echo "<p>This hospital has a Molecular Biology Department</p>";
     }
     if ($Departments == "Pediatrics") {
         echo "<p>This hospital has a Pediatrics Department</p>";
     }
     if ($Departments == "Anestheisa") {
         echo "<p>This hospital has an Anestheisa Department</p>";
         
     }
}
?>
<h1>Using built in PHP functions in_array and array_search()</h1>
<?php
// Gosselin Ch. 6 Page 329
// Rather than using custom functions as above you can use the in_array()
if (in_array("Pediatrics", $HospitalDepts)) {
    echo "<p>This hospital has a Pediatrics Department</p>";
}

//Gosselin Ch. 6 Page 329
//This example demonstrates how to use the array_search() function with $TopSellers[] array:
$TopSellers = array("Ford F-series",
    "Chevrolet Silverado", "Toyota Camry",
    "Honda Accord", "Toyota Corolla",
    "Honda Civic", "Nissan Altima",
    "Chevrolet Impala", "Dodge Ram",
    "Honda CR-V");
$SearchVehicle = "Ford F-series";
$Year = 2008;
$Ranking = array_search($SearchVehicle, $TopSellers); //First argument is needle and second is haystack (Array)
if ($Ranking !== FALSE) /*Strict not equal operator (!==) used because PHP equates a Boolean value of FALSE with 0, 
which is also the value that identifies the first element in an indexed array. Therefore "Ford F-series would return
0 or False, and wouldn't appear in the top 10..."
*/
{
    ++$Ranking; // Convert the array index to the rank value
    echo "<p>The $SearchVehicle is ranked # " . $Ranking . " in sales for " . $Year . ".</p>\n";
}
else 
    echo "<p>The $SearchVehicle is not ranked in the top ten selling vehicles for " . $Year . ".</p>\n";
?>