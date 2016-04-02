$mydata = array("id" =>'', choice1" => '', "choice2" => '', "choice3" => '', "choide4" => '', 
				"choice5" => '', "choice6" => ''); 

<!-- Get the id of the new group -->
$mydata["id"] = $_GET["id"]; 

<!-- Set the values of choices 1 - 6-->
for ($i = 1; $i <= 6; $i++) {
	$temp = 'choice' . $i; 
	$mydata[$temp] = $_GET[$temp]; 

}

<!-- Name of the file to be written to-->
$filename = $mydata["id"] . "txt";
$file; 

<!-- Check to see if the file exists, if not create a new one-->
if (!file_exists($filename)) {
	$file = fopen($filename, "a"); 
}

$file = fopen($filename, "a");

<!-- Append a new line to file and start writing in selections-->
fwrite($file, "\n"); 

foreach ($mydata as $item) {
	fwrite($item . "|")
}

