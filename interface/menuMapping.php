<?php

	$mysqli = mysqli_connect("localhost","root","","easymart2");
	$query = "SELECT * from menu_details";
	$data = mysqli_query($mysqli,$query);
	// while($row = mysqli_fetch_assoc($data)) {
 //    	print_r($row);echo "<br>";
 //  	}
 //  exit();

?>

<form action="#">
  <label for="name">Menu name:</label>
  <input type="text" id="name" name="name"><br>
  <label for="type">Menu type:</label>
  <select id="type" name="type">
  	<option value="0">Select</option>
  	<option value="1">Parent Menu</option>
  	<option value="2">Child Menu</option>
  </select>
  <br><label for="Parent">Parent Menu:</label>
  <select id="Parent" name="Parent">
  	<option value="0">Select</option>
  <?php
  	while($row = mysqli_fetch_assoc($data)) {
  		if ($row['menu_type'] == 1) {
    		echo '<option value = '.$row['id'].'>'.$row['menu_name'].'</option>';
  		}
  	}
  ?>
  </select><br>
  <label for="utype">User type:</label>
  <select id="utype" name="utype">
  	<option value="0">Select</option>
  	<option value="1">Admin</option>
  	<option value="2">User</option>
  </select>
  <select id="pantype" name="pantype">
    <option value="0">Select</option>
    <option value="1">SuperAdmin</option>
    <option value="2">Admin</option>
    <option value="3">normal</option>
  </select>
  <br>
  <label for="iname">Menu Icon:</label>
  <input type="text" id="iname" name="iname"><br>
  <!-- <input type="text" id="name" name="name"><br> -->
  <!-- <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value="Doe"><br><br> -->
  <input type="submit" value="Submit">
</form> 


<?php
if (isset($_GET['name'])) {
	// print_r(__DIR__);exit;
	$val = hash('sha256', $_GET['name']);
	$mysqli = new mysqli("localhost","root","","easymart2");
	$mysqli -> query("INSERT INTO menu_details (menu_name,enc_ctrl,menu_type,parent_menu,user_type_id,menu_icon,panelData,status) VALUES ('".$_GET['name']."','".$val."','".$_GET['type']."','".$_GET['Parent']."','".$_GET['utype']."','".$_GET['iname']."','".$_GET['pantype']."', 'Y')");
	echo"<br>";echo"Menu Added Successfully";echo"<br><br><br>";echo "Enc Name:".$val;echo"<br><br><br>";
}
?>