<?php  

//basta
session_start();
//to empty text box
$fname = $lname = $mname = $add1 = $add2 = $bd = $region = $city = $ages = "";
// for button update
$updbutton = false;
//for hidden text box;
$id=0;
// code for db connect
$mysqli = new mysqli('localhost', 'root', '', 'crud_walog') or die(mysqli_error($mysqli));
//for function onchange
$stat = false;

//for uploading data
if (isset($_POST['ent'])) {
	# code...
	$today = date("Y-m-d");
	$reg = $_POST['reg'];
	$city = $_POST['city'];
	$bd = date('Y-m-d', strtotime($_POST['bd']));
	$getage = date_diff(date_create($_POST['bd']), date_create($today));
	$age= $getage->format('%y');


	$result = $mysqli->query("SELECT * from region WHERE ID = '$reg'") or die($mysqli->error);
		// geget naten yung mga data if merong record na naquery
		if (count(array($result))==1) {
			# code...
			$row = $result->fetch_array();
			$regname = $row['Region'];
			
		}

	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$middlename = $_POST['mname'];
	$add1 = $_POST['addone'];
	$add2 = $_POST['addtwo'];
	$_SESSION['message'] = "New Record is added to the database!";
	$_SESSION['msg_type'] = "success";

	$mysqli->query("INSERT INTO student (FirstName, LastName, MiddleName, BD, Age, Add1, Add2, Region, CIty) VALUES ('$firstname', '$lastname', '$middlename', '$bd',$age, '$add1', '$add2', '$regname', '$city')") or die($mysqli->error);

	header("location: index.php");


}
// for deleting data
if (isset($_GET['del'])) {
	# code...
	$ID = $_GET['del'];

	$mysqli->query("DELETE from student WHERE ID = '$ID';") or die($mysqli->error);

	$_SESSION['message'] = "Record is removed from the database!";
	$_SESSION['msg_type'] = "danger";

	header("location: index.php");
}

// for getting the data that we want to update
if (isset($_GET['edit'])) {
	# code...
		$ID = $_GET['edit'];
		$updbutton = true;
		$result = $mysqli->query("SELECT * from student WHERE ID = '$ID'") or die($mysqli->error);
		// geget naten yung mga data if merong record na naquery
		if (count(array($result))==1) {
			# code...
			$row = $result->fetch_array();
			$id = $row['ID'];
			$fname = $row['FirstName'];
			$lname = $row['LastName'];
			$mname = $row['MiddleName'];
			$add1 = $row['Add1'];
			$add2 = $row['Add2'];
			$bd = $row['BD'];
			$region = $row['Region'];
			$city = $row['City'];
			$age = $row['Age'];
			
		}
}
//code updating data
if (isset($_POST['upd'])) {
	# code...
	$id = $_POST['id'];
	$reg = $_POST['reg'];
	$city = $_POST['city'];
	$bd = date('Y-m-d', strtotime($_POST['bd']));
	$getage = date_diff(date_create($_POST['bd']), date_create($today));
	$age= $getage->format('%y');

	$check = is_numeric($reg);
	if ($check==1) {
		# code...
		$result = $mysqli->query("SELECT * from region WHERE ID = '$reg'") or die($mysqli->error);
		// geget naten yung mga data if merong record na naquery
		if (count(array($result))==1) {
			# code...
			$row = $result->fetch_array();
			$reg = $row['Region'];
			
		}


	}
	

	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$middlename = $_POST['mname'];
	$add1 = $_POST['addone'];
	$add2 = $_POST['addtwo'];
	$mysqli->query("UPDATE student SET FirstName = '$firstname', LastName = '$lastname', MiddleName = '$middlename', Add1 = '$add1', Add2 = '$add2', BD = '$bd', Age= $age, Region='$reg', City = '$city' WHERE ID = '$id'") or die($mysqli->error);

	$_SESSION['message'] = "Record is updated successfully!";
	$_SESSION['msg_type'] = "warning";

	header("location: index.php");

}
function onchange(){
	$stat = true;
}
?>