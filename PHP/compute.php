<!-- Opens up the local file and returns back the queries with the most searhes -->
<?php

<!-- File url may be changed later -->
$filename = "templateurl.com/engine/groups/" . $_GET["id"] . ".txt";

$file = fopen($filename, "a+") or die echo "File was not opened\n";

if (filesize($file) == 0) {
	echo "There is no data in this file\n";
}






?>
