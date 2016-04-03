<!-- Opens up the local file and returns back the queries with the most searhes -->
<?php

<!-- File url may be changed later -->
$filename = "templateurl.com/engine/groups/" . $_GET["id"] . ".txt";

$file = fopen($filename, "a+") or die echo "File was not opened\n";

if (filesize($file) == 0) {
	echo "There is no data in this file\n";
}

<!-- Hashtable to keep track of what foods were requested-->
$choices = ();

while (($line = fgets($file)) != EOF) {
	$array = explode("|", $line);

	<!--  Iterates through every line and increments their numerical value in $choices-->
	foreach ($array as $word) {
		if ($word != " ") {
			$choices[$word]++;
		}
	}
}

<!-- This variable will store the query that is most requested -->
$most_requested; 

while ($key = current($choices)) {
	if ($choices[$key] > $most_requested) {
		$most_requested = $choices[$key]; 
	}
}


?>
