<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Message Board</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<!-- Page 352-355-->
</head>
<body>
<h1>Message Board</h1>
<?php
if (isset($_GET['action'])) {
     if ((file_exists(
          "MessageBoard/messages.txt")) &&
          (filesize(
          "MessageBoard/messages.txt") != 0)) {
          $MessageArray = file(
               "MessageBoard/messages.txt");
          switch ($_GET['action']) {
               case 'Delete First':
                    array_shift($MessageArray);
                    break;
               case 'Delete Last':
                    array_pop($MessageArray);
                    break;
               case 'Delete Message':
                    if (isset($_GET['message'])) {
                         $Index = $_GET['message'];
                         unset($MessageArray[$Index]);
                         $MessageArray =
                              array_values(
                              $MessageArray);
                    }
                    break;
               case 'Remove Duplicates':
                    $MessageArray = array_unique(
                         $MessageArray);
                    $MessageArray = array_values(
                         $MessageArray);
                    break;
               case 'Sort Ascending':
                    sort($MessageArray);
                    break;
          } // End of the switch statement
         if (count($MessageArray)>0) {
               $NewMessages =
                    implode($MessageArray);
               $MessageStore = fopen(
                    "MessageBoard/messages.txt",
                    "wb");
               if ($MessageStore === false)
                    echo "There was an error
                          updating the message
                          file\n";
               else {
                    fwrite($MessageStore,
                         $NewMessages);
                    fclose($MessageStore);
               }
          }
          else
               unlink(
                    "MessageBoard/messages.txt");
     }
}
if ((!file_exists("MessageBoard/messages.txt"))
     || (filesize("MessageBoard/messages.txt")
     == 0))
     echo "<p>There are no messages
          posted.</p>\n";
else {
     $MessageArray =
          file("MessageBoard/messages.txt");
     echo "<table
          style=\"background-color:lightgray\"
          border=\"1\" width=\"100%\">\n";
     $count = count($MessageArray);
     foreach ($MessageArray as $Message) {
          $CurrMsg = explode("~", $Message);  // Explodes $Message Array by delimiter "~"    
          $KeyMessageArray[] = $CurrMsg; // Assigns $CurrMsg array to $KeyMessageArray which creates a two-dimensional array. Because the $KeyMessageArray statement includes two array brackets at the end of the array name, each subsequent value in $CurrMsg[] is appended (added to end) to $KeyMessageArray[]
          }
     }
     
     for ($i = 0; $i < $count; ++$i) {
          echo "<tr>\n";
          echo "<td width=\"5%\"
               style=\"text-align:center;<span
               style=\"font-weight:bold\">" .
               ($i + 1) . "</span></td>\n";
          echo "<td width=\"85%\"><span
               style=\"font-weight:bold\">
               Subject:</span> " .
               htmlentities(
                    $KeyMessageArray[$i][0]) .
               "<br />\n";
          echo "<span
               style=\"font-weight:bold\">Name:
               </span> " .
               htmlentities(
                    $KeyMessageArray[$i][1]) .
               "<br />\n";
          echo "<span
               style=\"text-decoration:underline;
               font-weight:bold\">Message
               </span><br />\n" .
               htmlentities(
                    $KeyMessageArray[$i][2]) .
               "</td>\n";
          echo "<td width=\"10%\"
               style=\"text-align:center\">" .
               "<a href='MessageBoard.php?" .
               "action=Delete%20Message&" .
               "message=$i'>Delete This
               Message</a></td>\n";
          echo "</tr>\n";
     }
     echo "</table>\n";
    //} <-- In book, but shouldn't be..
     


?>
<p>
<a href="PostMessage.php">
     Post New Message</a><br />
<a href=
     "MessageBoard.php?action=Sort%20Ascending">
     Sort Subjects A-Z</a><br />
<a href=
     "MessageBoard.php?action=Remove%20Duplicates">
     Remove Duplicate Messages</a><br />
<a href="MessageBoard.php?action=Delete%20First">
     Delete First Message</a><br />
<a href="MessageBoard.php?action=Delete%20Last">
     Delete Last Message</a>

</p>
</body>
</html>

