<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Your Chinese Zodiac Sign</title>
<link rel="stylesheet" type="text/css" href="ChineseZodiac.css" /> 
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<div class="header">
<h1>Your Chinese Zodiac Sign</h1>
<h2>using a <span class="code">switch</span> statement</h2>
</div>
<div class="midblock">
<?php
function validateInput($data, $fieldName) {
     global $errorCount;
     if (empty($data)) {
          echo "\"$fieldName\" is a required field.<br />\n";
          ++$errorCount;
          $retval = "";
     } else { // Only clean up the input if it isn't empty
          $retval = trim($data);
          $retval = stripslashes($retval);
     }
     return($retval);
}

function displayForm($Year) {
?>
<form action = "<?php echo $_SERVER['SCRIPT_NAME']; ?>" method = "post">
<p>Your Birth Year: <input type="text" name="Year" value="<?php echo $Year; ?>" /></p>
<p><input type="reset" value="Clear Form" />&nbsp; &nbsp;<input type="submit" name="Submit" value="Show Me My Sign" /></p>
</form>
<?php
}

function StatisticsForYear($Year) {
     $retval = 0;
     $counter_file = "./statistics/BirthYear_" . $Year . "_Count.txt";
   
     if ((is_file($counter_file)) &&
               (is_readable($counter_file))) {
          $retval = file_get_contents($counter_file); 
     }
     
     ++$retval; // Add the current visitor to the total
   
   file_put_contents($counter_file, $retval);
   
   return($retval);
}

function displayResults($Year) {
$AnimalSigns = array(
         "Rat" => array(
              "Start Date" => 1900,
              "End Date" => 2020,
              "President" => "George Washington"),
         "Ox" => array(
              "Start Date" => 1901,
              "End Date" => 2021,
              "President" => "Barack Obama"),
         "Tiger" => array(               
              "Start Date" => 1902,               
              "End Date" => 2022,               
              "President" => "Dwight Eisenhower"),
         "Rabbit" => array(              
              "Start Date" => 1903,               
              "End Date" => 2023,    
              "President" => "John Adams"),
         "Dragon" => array(  
              "Start Date" => 1904, 
              "End Date" => 2024,   
              "President" => "Abraham Lincoln"),
         "Snake" => array(   
              "Start Date" => 1905,   
              "End Date" => 2025,  
              "President" => "John Kennedy"),
         "Horse" => array(   
              "Start Date" => 1906,  
              "End Date" => 2026,   
              "President" => "Theodore Roosevelt"),
         "Goat" => array(   
              "Start Date" => 1907,  
              "End Date" => 2027,  
              "President" => "James Madison"),
         "Monkey" => array(    
              "Start Date" => 1908,   
              "End Date" => 2028,    
              "President" => "Harry Truman"),
         "Rooster" => array(    
              "Start Date" => 1909,  
              "End Date" => 2029,   
              "President" => "Grover Cleveland"),
         "Dog" => array(   
              "Start Date" => 1910,    
              "End Date" => 2030,  
              "President" => "George Walker Bush"),
         "Pig" => array(    
              "Start Date" => 1911,   
              "End Date" => 2031,  
              "President" => "Ronald Reagan"));

     $CZIndex = ($Year+8) % 12;
     switch ($CZIndex) {
          case 0:
               echo "<p>You were born under the sign of the Rat.</p>\n";
               echo "<p><img src='Images/Rat.gif' alt='Rat' title='Rat' /></p>\n";
               $ChosenSign="Rat";
               break;
          case 1:
               echo "<p>You were born under the sign of the Ox.</p>\n";
               echo "<p><img src='Images/Ox.gif' alt='Ox' title='Ox' /></p>\n";
               $ChosenSign="Ox";
               break;
          case 2:
               echo "<p>You were born under the sign of the Tiger.</p>\n";
               echo "<p><img src='Images/Tiger.gif' alt='Tiger' title='Tiger' /></p>\n";
               $ChosenSign="Tiger";
               break;
          case 3:
               echo "<p>You were born under the sign of the Rabbit.</p>\n";
               echo "<p><img src='Images/Rabbit.gif' alt='Rabbit' title='Rabbit' /></p>\n";
               $ChosenSign="Rabbit";
               break;
          case 4:
               echo "<p>You were born under the sign of the Dragon.</p>\n";
               echo "<p><img src='Images/Dragon.gif' alt='Dragon' title='Dragon' /></p>\n";
               $ChosenSign="Dragon";
               break;
          case 5:
               echo "<p>You were born under the sign of the Snake.</p>\n";
               echo "<p><img src='Images/Snake.gif' alt='Snake' title='Snake' /></p>\n";
               $ChosenSign="Snake";
               break;
          case 6:
               echo "<p>You were born under the sign of the Horse.</p>\n";
               echo "<p><img src='Images/Horse.gif' alt='Horse' title='Horse' /></p>\n";
               $ChosenSign="Horse";
               break;
          case 7:
               echo "<p>You were born under the sign of the Goat.</p>\n";
               echo "<p><img src='Images/Goat.gif' alt='Goat' title='Goat' /></p>\n";
               $ChosenSign="Goat";
               break;
          case 8:
               echo "<p>You were born under the sign of the Monkey.</p>\n";
               echo "<p><img src='Images/Monkey.gif' alt='Monkey' title='Monkey' /></p>\n";
               $ChosenSign="Monkey";
               break;
          case 9:
               echo "<p>You were born under the sign of the Rooster.</p>\n";
               echo "<p><img src='Images/Rooster.gif' alt='Rooster' title='Rooster' /></p>\n";
               $ChosenSign="Rooster";
               break;
          case 10:
               echo "<p>You were born under the sign of the Dog.</p>\n";
               echo "<p><img src='Images/Dog.gif' alt='Dog' title='Dog' /></p>\n";
               $ChosenSign="Dog";
               break;
          case 11:
               echo "<p>You were born under the sign of the Pig.</p>\n";
               echo "<p><img src='Images/Pig.gif' alt='Pig' title='Pig' /></p>\n";
               $ChosenSign="Pig";
               break;
     } 
     $SignMessage = "If your Chinese zodiac sign is 
          the $ChosenSign, you share a zodiac sign
          with President " .
          $AnimalSigns[$ChosenSign]["President"] .
          ". ";
     $SignMessage .= "Years of the $ChosenSign
          include ";
     for ($i = $AnimalSigns[$ChosenSign]["Start Date"],
          $i < $AnimalSigns[$ChosenSign]["End Date"],
          $i+=12)
          $SignMessage .= $i . ", ";
     $SignMessage .= "and " .
          $AnimalSigns[$ChosenSign]["End Date"] . ".";
     echo "<p>$SignMessage</p>\n";

     $YearCount = StatisticsForYear($Year);
     echo "<p>You are person $YearCount to enter the year $Year.</p>\n";
     echo "<p style = 'text-align:center'><a href='index.php?page=control_structures'>Back</a></p>\n";
}

$ShowForm = TRUE;
$errorCount = 0;
$Year = date("Y");
if (isset($_POST['Submit'])) {
     $Year = validateInput($_POST['Year'],"Birth Year");
     if ($errorCount==0)
          $ShowForm = FALSE;
     else
          $ShowForm = TRUE;
}
if ($ShowForm == TRUE) {
     if ($errorCount>0) // if there were errors
          echo "<p>Please re-enter the form information below.</p>\n";
     displayForm($Year);
} 
else {
     displayResults($Year);
}

?>
</div>
<div class="footer"><?php include("Includes/inc_footer.php"); ?></div>
</body>
</html>

