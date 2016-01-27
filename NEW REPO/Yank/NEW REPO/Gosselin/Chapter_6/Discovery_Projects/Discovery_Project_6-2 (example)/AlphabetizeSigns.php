<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Alphabetize Signs</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<h1>Alphabetize Signs</h1>
<?php
$SignFound = array(
         "Rat" => FALSE,
         "Ox" => FALSE,
         "Tiger" => FALSE,
         "Rabbit" => FALSE,
         "Dragon" => FALSE,
         "Snake" => FALSE,
         "Horse" => FALSE,
         "Goat" => FALSE,
         "Monkey" => FALSE,
         "Rooster" => FALSE,
         "Dog" => FALSE,
         "Pig" => FALSE);

$EnteredArray=array();
$DisplayString="";
$DisplayConnector="";
$DisplayCount=0;
$BadNameString="";
$BadNameConnector="";
$BadNameCount=0;
if (isset($_POST['submit'])) {
     if (isset($_POST['list'])) {
          $EnteredSigns = explode(",",$_POST['list']);
          foreach ($EnteredSigns as $CurrentSign) {
               $EnteredText=trim($CurrentSign);
               if (strlen($EnteredText)>0) {
                    $SignIndex=strtolower($EnteredText);
                    $SignIndex=ucfirst($SignIndex);
                    if (isset($SignFound[$SignIndex])) {
                         $DisplayString.=$DisplayConnector.$SignIndex;
                         $DisplayConnector=", ";
                         ++$DisplayCount;
                         $SignFound[$SignIndex]=TRUE;
                         $EnteredArray[]=$SignIndex;
                    }
                    else {
                         $BadNameString.=$BadNameConnector.$SignIndex;
                         $BadNameConnector=", ";
                         ++$BadNameCount;
                    }
               }
          }
     }
     if ($BadNameCount>0) 
          echo "<p>The following signs are not part of the Chinese zodiac, and were removed from the list: $BadNameString</p>\n";
     if ($DisplayCount==12) {
          echo "<p>The signs were entered in this order: $DisplayString</p>\n";
          sort($EnteredArray);
          $DisplayString="";
          $DisplayConnector="";
          foreach ($EnteredArray as $CurrentSign) {
               $DisplayString.=$DisplayConnector.$CurrentSign;
               $DisplayConnector=", ";
               ++$DisplayCount;
               $SignFound[$SignIndex]=TRUE;
               $EnteredArray[]=$EnteredText;
          }
          echo "<p>The signs are sorted in this order: $DisplayString</p>\n";
          $DisplayString="";
     }
     else if ($DisplayCount==0) {
          echo "<p>There are no valid signs in the list. Please enter the twelve Chinese zodiac signs.</p>\n";
     } 
     else {
          echo "<p>There are only $DisplayCount valid signs in the list. Please enter the remaining " .
               (12-$DisplayCount) . " signs.</p>\n";
     }
     
}
?>
<form action="AlphabetizeSigns.php" method="POST">
Please enter the twelve Chinese zodiac signs below, separated by commas. When you
are finished, click on the "Sort" button to see them in sorted order.<br />&nbsp;<br />
<input type="text" name="list" size="200" value="<?php echo $DisplayString; ?>" /><br />&nbsp;<br />
<input type="submit" name="submit" value="Sort" />
</form>
</body>
</html>

