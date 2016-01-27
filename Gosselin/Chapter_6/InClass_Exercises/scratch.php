<h1>Hello World</h1>

<?php
$cars = array(array("Volvo",22,18),array("BMW",15,13),array("Saab",5,2 ),array("Landrover",7,15));
echo "Hello World!!";
echo $cars[0][1];
print_r($cars[0] [1] . ": In Stock" , $cars [0] [1] . "sold: " . $cars [0] [2] . ".<br />");
print_r($cars[1] [1] . ": In Stock" , $cars [1] [1] . "sold: " . $cars [1] [2] . ".<br />");
print_r($cars[2] [1] . ": In Stock" , $cars [2] [1] . "sold: " . $cars [2] [2] . ".<br />");
print_r($cars[3] [1] . ": In Stock" , $cars [3] [1] . "sold: " . $cars [3] [2] . ".<br />");

?>