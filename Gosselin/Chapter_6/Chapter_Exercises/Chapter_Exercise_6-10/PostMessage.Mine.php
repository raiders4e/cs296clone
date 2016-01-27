<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Post Message</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
     <!-- Exercise 6-10 P. 330 Modifies PostMessage.php to allow only unique subjects to be added. -->
<?php
if (isset($_POST['submit'])) {
     $Subject = stripslashes($_POST['subject']);
     $Name = stripslashes($_POST['name']);
     $Message = stripslashes($_POST['message']);
     // Replace any '~' characters
     //      with '-' characters
     $Subject = str_replace("~", "-", $Subject);
     $Name = str_replace("~", "-", $Name);
     $Message = str_replace("~", "-", $Message);
     
     $ExistingSubjects = array(); // Initializes an empty array that will be used to determine if a subject already exists.
     if(file_exists(
          "MessageBoard/messages.txt") &&
          filesize("MessageBoard/messages.txt")
          > 0) {
          $MessageArray = file(
               "MessageBoard/messages.txt"); // file() function assigns text in messages.txt to $MessageArray[] into the $CurrMsg[] array.
          $count = count($MessageArray); //counts elements in $MessageArray[]
          for ($i = 0; $i < $count; $i++) { 
               $CurrMsg = explode("~", 
               $MessageArray[$i]); //Explodes each element in $MessageArray[] into $CurrMsg[] array
               $ExistingSubjects[] = $CurrMsg[0]; //Subject, which is stored in $CurrMsg[0], is added to $ExistingSubjects array.*/
          }
     }
     if(in_array($Subject, $ExistingSubjects)) { // in_array used to determine if the entered subject is found in the $ExistingSubjects array.
          echo "<p>The subject you entered 
               already exists!<br />\n";
          echo "Please enter a new subject and
               try again.<br />\n";
          echo "Your message was not saved.</p>";
               $Subject = ""; // Resets $Subject to empty string if subject exists.
     }
     else {
          $MessageRecord =
               "$Subject~$Name~$Message\n";
          $MessageFile = fopen(
               "MessageBoard/messages.txt",
               "ab");
          if ($MessageFile === false)
               echo "There was an error saving your
                    message!\n";
          else {
               fwrite($MessageFile,
                    $MessageRecord);
               fclose($MessageFile);
               echo "Your message has been 
                    saved.\n";
               $Subject = ""; // Sets to empty trying if sucessfully saved
               $Message = ""; // Sets to empty trying if sucessfully saved
              
          }
     }
}
else {
     //Clears out the $Subject, $Name and $Message variables if there is no posted data.
     $Subject = ""; 
     $Name = "";
     $Message = "";
}
?>
<h1>Post New Message</h1>
<hr />
<form action="PostMessage.php" method="POST">
<span style="font-weight:bold">Subject:</span>
     <input type="text" name="subject"
     value="<?php echo $Subject; ?>" />
<span style="font-weight:bold">Name:</span>
     <input type="text" name="name"
     value="<?php echo $Name; ?>" /><br />
<textarea name="message" rows="6"
     cols="80"><?php echo $Message; ?></textarea><br />
     <input type="submit" name="submit"
     value="Post Message" />
     <input type="reset" name="reset"
     value="Reset Form" />
</form>
<hr />
<p>
<a href="MessageBoard.php">View Messages</a>
</p>
</body>
</html>

