<p style="font-style:italic"><?php
$ProverbFileName = "proverbs.txt";
     
$ProverbArray = file($ProverbFileName, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
if ($ProverbArray===FALSE)
   echo "There are no proverbs available.\n";
else if (count($ProverbArray)==0)
   echo "There are no proverbs available.\n";
else {
   $i = rand(0,count($ProverbArray)-1);
   echo "&ldquo;" . htmlentities(trim($ProverbArray[$i])) . "&rdquo;\n";
} 

$DragonImages = array();
// Simple solution
/*
$ImageFiles = scandir("Images");
foreach ($ImageFiles as $ImageFile) { 
     if (preg_match('/^Dragon\d+\.(gif|jpg|png)$/',$ImageFile)) {
          $DragonImages[] = $ImageFile;
     }
}
*/
// Complex solution
$dh  = opendir("Images");
while (($ImageFile = readdir($dh)) !== FALSE) {
     if (preg_match('/^Dragon\d+\.(gif|jpg|png)$/',$ImageFile)) {
          $DragonImages[] = $ImageFile;
     }
}
if (count($DragonImages)>0) {
   shuffle($DragonImages);
   echo "<br />\n";
   echo "<img src=\"Images/" . $DragonImages[0] . "\" alt=\"Dragon Image\" />\n";
}
?></p>
<p>&copy; 2009</p>
