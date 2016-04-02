<!-- To record the queries sent by the users -->
<?php

<!-- Retrieves number of choices user picked --> 
$choices = count($_GET); 

if ($choices > 0) {
	$keys = array_keys($_GET); 
	$mydata = (); 

	<!-- Create an associative array of key value pairs that are not the id -->
	foreach ($keys as $item) {
		$temp = strtolower($item);
		if ($temp != 'id') {
			$mydata[$temp] = strtolower($_GET[$item]); 
		}
	}

	<!-- Get the id of the new group -->
	$id = $_GET['id'];


	<!-- Name of the file to be written to-->
	$filename = $id . ".txt";

	<!-- Replace the templateurl with the real url later-->
	$abpath = "templateurl/engine/groups/" . $filename; 
	
	<!-- Opens/create a new file with $abpath -->
	$file = fopen($abpath, "a+");

	<!-- Append and start writing in selections-->

	while ($key = current($mydata)) {
		fwrite($file, $mydata[$key]. "|");
		
	}

	<!-- not sure if newline is needed -->
	fwrite($file, "\n");
	fclose($file);

} else {
	echo "No arguments were sent\n";
}

?>

<!-- sample url:   cravespace.com/query.php?id=12345&choice1 = "pizza"&choice2 = "cake"&choice3 = 5 ... etc -->
