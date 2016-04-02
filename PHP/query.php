<?php

$mydata = array("id" =>'', "choice1" => '', "choice2" => '', "choice3" => '', "choice4" => '', 
				"choice5" => '', "choice6" => ''); 

<!-- Get the id of the new group -->
$mydata["id"] = $_GET["id"]; 

<!-- Set the values of choices 1 - 6-->
for ($i = 1; $i <= 6; $i++) {
	$temp = 'choice' . $i; 
	$mydata[$temp] = $_GET[$temp]; 

}

<!-- Name of the file to be written to-->
$filename = $mydata["id"] . ".txt";

<!-- Replace the templateurl with the real url later-->
$abpath = "templateurl/engine/groups/" . $filename; 
$file; 

<!-- Check to see if the file exists, if not create a new one-->
if (!file_exists($abpath)) {
	$file = fopen($abpath, "a"); 
}

$file = fopen($abpath, "a");

<!-- Append a new line to file and start writing in selections-->
fwrite($file, "\n"); 
fwrite($file, json_encode($mydata));

?>

