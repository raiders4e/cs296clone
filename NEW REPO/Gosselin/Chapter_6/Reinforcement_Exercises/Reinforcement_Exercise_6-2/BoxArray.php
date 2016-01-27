<html>
<head>
     <!-- Gosselin Ch.6 Exercise 6-2 P. 373 -->
<title>Box Array</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php
$Boxes = array(
     "Small" => array(
          "Length" => 12, "Width" => 10, "Depth" => 2.5),
     "Medium" => array(
          "Length" => 30, "Width" => 20, "Depth" => 4),
     "Large" => array(
          "Length" => 60, "Width" => 40, "Depth" => 11.5));
foreach ($Boxes as $Type => $Box) {
     echo "<p>$Type Box = " . $Box["Length"] . "&rdquo;L &times; ";
     echo $Box["Width"] . "&rdquo;W &times; ";
     echo $Box["Depth"] . "&rdquo;D = ";
     echo ($Box["Length"]*$Box["Width"]*$Box["Depth"]) . " cu. in.</p>\n";
}
?>
</body>
</html>

