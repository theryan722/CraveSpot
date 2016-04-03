<!-- Opens up the local file and returns back the queries with the most searhes -->
<?php

<!-- File url may be changed later -->
$filename = "/groups/" . $_GET["id"] . ".txt";

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

<!-- Retrieving popular restaurants near the area (debatable)-->
$client_id = "MZBXZQHK3HDVZXRJQN3GLZQ3FI5W2XNRUEYMUZIFYKQWUVN0"; 
$client_secret = "3HPKD4GEX3O0H4QFDBK5M4THJSKDZFI24KKXHOKWE1PQAQYY";

$json = file_get_contents("https://api.foursquare.com/v2/venues/explore
  						  ?client_id=" . $client_id . 
  						  "&client_secret=" . $client_secret . 
						  "&v=20160301
						  &ll=40.7,-74
						  &query=" . $most_requested);

$restaurant_info = json_decode($json); 

<!-- Retrieving venue name from json string-->
$venue = $restaurant_info->response->venues[0]; 
$name = $venue->name; 
$number = $venue->contact->formattedPhone; 
$location;
<!-- Concatanating address-->
foreach ($venue->location->formattedAddress as $item) {
	$location = $location . $item;
}
$distance = $venue->location->distance;


$venue_info = ($name, $number, $location);

?>
