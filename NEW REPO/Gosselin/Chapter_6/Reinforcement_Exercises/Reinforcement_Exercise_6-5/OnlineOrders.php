<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Online Order Form</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<h1>Online Order Form</h1>
<?php
// $ShowForm = FALSE;
$ShowForm = FALSE;
$ShowLink = FALSE;

$ItemList = array(
   array("name"=>"Flexovit Saw Wheel — 12in. Dia.", 
         "description"=>"High speed gas and electric saw wheel has durable blade for all metal or concrete/masonry cutting jobs. Designed and reinforced for 12in. and 14in. portable high speed saws. U.S.A.",
         "price"=>3.99,
         "quantity"=>0),
   array("name"=>"Havahart Critter Ridder — 2.2 Lb., Model# 3142", 
         "description"=>"Havahart Critter Ridder repels skunks, squirrels, dogs, cats, groundhogs and raccoons by using odor and taste. U.S.A.",
         "price"=>8.99,
         "quantity"=>0),
   array("name"=>"Irwin Quick-Grip Pipe Clamp — 3/4in.", 
         "description"=>"Quick–release clutch system eliminates the need for threaded pipe. Larger feet offer increased stability and increased space between handle and work top.",
         "price"=>13.99,
         "quantity"=>0),
   array("name"=>"Titan Quick-Release Bit Extension — 18in., Model# 16018", 
         "description"=>"Titan quick-release bit extension is designed for working in hard-to-reach areas.",
         "price"=>7.99,
         "quantity"=>0),
   array("name"=>"Rat Zapper Rat Tale", 
         "description"=>"For use with Rat Zapper Item# 168430. Attach to Rat Zapper to monitor the trap in difficult-to-reach places like attics, false ceilings or under stair wells. Has 12-ft. cord and 2 blinking lights to let you know when to empty your Rat Zapper.",
         "price"=>9.99,
         "quantity"=>0)
);

if (isset($_POST['quantity'])) {
   if (is_array($_POST['quantity'])) {
      foreach ($_POST['quantity'] as $Index => $Qty) {
         $ItemList[$Index]["quantity"] = $Qty;
      }
   }
}
if (isset($_POST['purchace'])) { // Place order
   $TimeMicro = microtime();
   $TimeArray = explode(" ",$TimeMicro);
   $OutName = "OnlineOrders/" . $TimeArray[1] . "." . $TimeArray[0] . ".txt";
   $OutArray = array();
   $OrderedItemCount = 0;
   foreach ($ItemList as $Index => $Info) {
      if ($Info["quantity"]>0) {
         ++$OrderedItemCount;
         $TempString=$Index . "," . $Info["name"] . "," . 
               $Info["quantity"] . "," . $Info["price"] . "," . 
               ($Info["quantity"] * $Info["price"]) . "\n";
         $OutArray[]=$TempString;
      }
   }
   if ($OrderedItemCount>0) {
      $ShowLink = TRUE;
      $result=file_put_contents($OutName,$OutArray);
      if ($result===FALSE)
         echo "<p>There was a problem saving your order.</p>\n";
      else
         echo "<p>Your order was successfully submitted.</p>\n";
   }
   else {
      echo "<p>You have not ordered anything yet.</p>\n";
      $ShowForm = TRUE;
   }
}
else {
   $ShowForm=TRUE;
   if (isset($_POST['AddItem'])) {
      if (is_array($_POST['AddItem'])) {
         $ItemsToAdd=array_keys($_POST['AddItem']);
         foreach ($ItemsToAdd as $Index) {
            ++$ItemList[$Index]["quantity"];
         }
      }
   }
   if (isset($_POST['SubtractItem'])) {
      if (is_array($_POST['SubtractItem'])) {
         $ItemsToSubtract=array_keys($_POST['SubtractItem']);
         foreach ($ItemsToSubtract as $Index) {
            --$ItemList[$Index]["quantity"];
         }
      }
   }
}

if ($ShowForm) {
   echo "<form action=\"OnlineOrders.php\" method=\"POST\">\n";
}
echo "   <table cellspacing=\"0\">\n";
echo "      <tr><th";
if ($ShowForm) {
   echo "colspan=\"2\"";
}
echo ">&nbsp;&nbsp;Qty.&nbsp;&nbsp;</th>" .
     "<th>&nbsp;&nbsp;Item&nbsp;&nbsp;</th>" .
     "<th>&nbsp;&nbsp;Unit&nbsp;Price&nbsp;&nbsp;</th>" .
     "<th>&nbsp;&nbsp;Item&nbsp;Subtotal&nbsp;&nbsp;</th></tr>\n";
$ItemCount=count($ItemList);
$TotalItems=0;
$TotalAmount=0;
$bgcolor="LightGrey";
for ($i=0;$i<$ItemCount;++$i) {
   $SubtotalAmount=$ItemList[$i]["quantity"] * $ItemList[$i]["price"];
   $UnitPrice = number_format($ItemList[$i]["price"], 2, '.', ',');
   $ItemPrice = number_format($SubtotalAmount, 2, '.', ',');
   $TotalItems+=$ItemList[$i]["quantity"];
   $TotalAmount+=$SubtotalAmount;
   echo "      <tr style=\"background-color:$bgcolor\"><td>&nbsp;&nbsp;" . 
        $ItemList[$i]["quantity"] . "<input type=\"hidden\" name=\"quantity[$i]\" value=\"" . 
        $ItemList[$i]["quantity"] . "\" />&nbsp;&nbsp;</td>";
   if ($ShowForm) {
      echo "<td>";
      if ($ItemList[$i]["quantity"]>0) {
         echo "<input style=\"width:20px;\" type=\"submit\" name=\"SubtractItem[$i]\" value=\"-\" /><br />";
      }
      echo "<input style=\"width:20px;\" type=\"submit\" name=\"AddItem[$i]\" value=\"+\" /></td>";
   }
   echo "<td>&nbsp;&nbsp;<strong>" .
            $ItemList[$i]["name"] . "</strong>&nbsp;&nbsp;<br />&nbsp;&nbsp;" . $ItemList[$i]["description"] . 
            "&nbsp;&nbsp;</td><td align=\"right\">&nbsp;&nbsp;$UnitPrice&nbsp;&nbsp;</td><td align=\"right\">&nbsp;&nbsp;$ItemPrice&nbsp;&nbsp;</td></tr>\n";
      if ($bgcolor=="Silver")
         $bgcolor="LightGrey";
      else
         $bgcolor="Silver";
   }
   if ($TotalItems>0) {
      $TotalPrice = number_format($TotalAmount, 2, '.', ',');
      echo "      <tr><td colspan=\"2\">&nbsp;&nbsp;<strong>$TotalItems</strong>&nbsp;&nbsp;</td>";
      echo "<td ";
      if ($ShowForm) {
         echo "colspan=\"2\"";
      }
      echo "align=\"right\">&nbsp;&nbsp;<strong>Total =&gt;</strong>&nbsp;&nbsp;" . 
            "</td><td align=\"right\">&nbsp;&nbsp;<strong>\$&nbsp;$TotalPrice</strong>&nbsp;&nbsp;</td></tr>\n";
   }
   echo "   </table>\n";
   echo "   <br />\n";
if ($ShowForm) {
   if ($TotalItems>0) {
      echo "   <input type=\"submit\" name=\"purchace\" value=\"Place Order\" />\n";
   }
   echo "</form>\n";
}
if ($ShowLink) {
   echo "   <a href=\"OnlineOrders.php\">Place another order</a>\n";
}
?>
</body>
</html>

