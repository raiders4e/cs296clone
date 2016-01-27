<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Guest Book</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<h1>Guest Book</h1>
<?php
if ((file_exists("GuestBook.txt")) &&
          (filesize("GuestBook.txt") != 0)) {
     $GuestBookArray = file("GuestBook.txt");
}
else {
     $GuestBookArray = array();
}
if (isset($_POST['submit'])) {
     if (strlen($_POST['name'])==0) {
          echo "Youo need to enter your name\n";
     }
     else {
          if (!in_array($_POST['name'],$GuestBookArray)) {
               $GuestBookArray[] = $_POST['name'] . "\n"; 
               $GuestBookChanged = TRUE;
          }
     }
}
else if (isset($_GET['action'])) {
     switch ($_GET['action']) {
          case 'Delete Duplicates':
               $GuestBookArray = array_unique(
                    $GuestBookArray);
               $GuestBookArray = array_values(
                    $GuestBookArray);
               $GuestBookChanged = TRUE;
               break;
          case 'Sort':
               sort($GuestBookArray);
               $GuestBookChanged = TRUE;
               break;
     } // End of the switch statement
}
if ($GuestBookChanged) {
     if (count($GuestBookArray)>0) {
          $NewMessages = implode($GuestBookArray);
          $MessageStore = fopen("GuestBook.txt","wb");
          if ($MessageStore === false)
               echo "There was an error updating the message file\n";
          else {
               fwrite($MessageStore,$NewMessages);
               fclose($MessageStore);
          }
     }
     else
          unlink("GuestBook.txt");
}

if ((!file_exists("GuestBook.txt")) || (filesize("GuestBook.txt") == 0))
     echo "<p>There are no entries in the guest book.</p>\n";
else {
     $GuestBookArray = file("GuestBook.txt");
     echo "<table style=\"background-color:lightgray\" border=\"1\" width=\"100%\">\n";
     $count = count($GuestBookArray);
     foreach ($GuestBookArray as $Signer) {
          echo "<tr>\n";
          echo "<td>" . htmlentities($Signer) . "</td>\n";
          echo "</tr>\n";
     }
     echo "</table>\n";
}
?>
<p>
<a href=
     "GuestBook.php?action=Sort">
     Sort Names</a><br />
<a href=
     "GuestBook.php?action=Delete%20Duplicates">
     Delete Duplicate Entries</a><br />
<form action="GuestBook.php" method="POST">
<strong>Sign the Guest Book:</strong><br />
<p>Your Name: <input type="text" name="name" /></p>
<p>
   <input type="reset" name="reset" value="Clear Form" />
   <input type="submit" name="submit" value="Sign the Guest Book" />
</p>
</form>
</p>
</body>
</html>

