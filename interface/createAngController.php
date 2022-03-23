
<form action="#">
  <label for="name">Angular Controller name:</label><br>
  <input type="text" id="name" name="name"><br>
  <!-- <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value="Doe"><br><br> -->
  <input type="submit" value="Submit">
</form> 


<?php
if (isset($_GET['name'])) {
	// print_r(__DIR__);exit;
	$mysqli = new mysqli("localhost","root","","easymart2");
	$mysqli -> query("INSERT INTO controller (controllerName, status) VALUES ('".$_GET['name']."', 'Y')");

	$myfile = fopen(__DIR__."/../assets/js/".$_GET['name'].".js", "w") or die("Unable to open file!");
	$txt = "app.controller('".$_GET['name']."', function($".'scope'.",$".'http'.") { \n\n\n\n\n\n";
	fwrite($myfile, $txt);
	$txt = "\n});";
	fwrite($myfile, $txt);
	fclose($myfile);
	echo "created successfully";

}
?>