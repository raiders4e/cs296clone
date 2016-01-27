<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Chinese Zodiac Image Gallery</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<h1 align="center">Chinese Zodiac Image Gallery</h1>
<?php
$SignImages = array(
         "Rat.gif" => "Stylized image of a rat",
         "Ox.gif" => "Stylized image of an ox",
         "Tiger.gif" => "Stylized image of a tiger",
         "Rabbit.gif" => "Stylized image of a rabbit",
         "Dragon.gif" => "Stylized image of a dragon",
         "Snake.gif" => "Stylized image of a snake",
         "Horse.gif" => "Stylized image of a horse",
         "Goat.gif" => "Stylized image of a goat",
         "Monkey.gif" => "Stylized image of a monkey",
         "Rooster.gif" => "Stylized image of a rooster",
         "Dog.gif" => "Stylized image of a dog",
         "Pig.gif" => "Stylized image of a pig");
         
echo "<div align=\"center\">\n";
echo "     <table style=\"align: center\" cellpadding=\"30\">\n";
$ImageNumber=0;
foreach ($SignImages as $File => $Caption) {
     if (($ImageNumber%4)==0)
          echo "          <tr>\n";
          echo "               <td><a href=\"Images/$File\">" .
               "<img src=\"Images/$File\" alt=\"$Caption\" height=\"29\" width=\"29\" /><br />" . 
               "$Caption</td>\n";
     ++$ImageNumber;
     if (($ImageNumber%4)==0)
          echo "          </tr>\n";
}

echo "     </table>\n";
echo "</div>\n";
?>
</body>
</html>

