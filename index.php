<!DOCTYPE html>
<html>
<head>
	<title>Walog_Crud</title>


	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
<script>
	function getregid(val){
		//alert("Gumana");
		$.ajax({
			type:"POST",
			url: "getcity.php",
			data: 'regid='+val, 
			success: function(data){

				$("#city-list").html(data);
			}

		})

	}
</script>
<body>
<?php require_once 'action.php'; //for form ?>
<?php if (isset($_SESSION['message'])): //for alerts print code?>
<div class="alert alert-<?=$_SESSION['msg_type']?>" >
	<?php
	echo $_SESSION['message'];
	unset($_SESSION['message']);
	  ?>
</div>
<?php endif; //end if statement for alert print code?>
<br><br>
<div style="text-align: center;">
	<h2>Simple CRUD System</h2>
	<br><br>
</div>
<div class="container">
	<?php
//for table query
 $mysqli = new mysqli('localhost', 'root', '', 'crud_walog') or die(mysqli_error($mysqli));

	$result = $mysqli->query("SELECT * from student") or die($mysqli->error);
	$result1 = $mysqli->query("SELECT * from region") or die($mysqli->error);

 ?>


<div class="row justify-content-center table-wrapper-scroll-y my-custom-scrollbar">
	<table class="table table-striped table-hover table-responsive " >
		<thead>
			<tr>
				<th>#</th>
				<th>First Name</th>
				<th> Middle Name</th>
				<th>Last Name</th>
				<th>Birthday</th>
				<th>Age</th>
				<th>Region</th>
				<th>City</th>
				<th>Address 1</th>
				<th>Address 2</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>#</th>
				<th>First Name</th>
				<th> Middle Name</th>
				<th>Last Name</th>
				<th>Birthday</th>
				<th>Age</th>
				<th>Region</th>
				<th>City</th>
				<th>Address 1</th>
				<th>Address 2</th>
				<th colspan="2">Action</th>
			</tr>
		</tfoot>
		
			<?php while ($row = $result->fetch_assoc()): ?>

			<tr>
				<td><?php echo $row['ID']; ?></td>
				<td><?php echo $row['FirstName']; ?></td>
				<td><?php echo $row['MiddleName']; ?></td>
				<td><?php echo $row['LastName']; ?></td>
				<td><?php echo $row['BD']; ?></td>
				<td><?php echo $row['Age']; ?></td>
				<td><?php echo $row['Region']; ?></td>
				<td><?php echo $row['City']; ?></td>
				<td><?php echo $row['Add1']; ?></td>
				<td><?php echo $row['Add2']; ?></td>
				<td>
					<a href="index.php?edit=<?php echo $row['ID']; ?>" class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></a>
<a onclick="return confirm('Confirm Deletion?')" href="action.php?del=<?php echo $row['ID']; ?>" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg></a>
				</td>
			</tr>
		<?php endwhile;	 ?>
		
		
	</table>


</div>
</div>
<?php if ($updbutton == true): ?>
	<br><br>
<div style="text-align: center;">
	<h2>Record Info</h2>
	<h4>You can update the record info</h4>
	<br><br>
</div>

<?php else: ?>
	<br><br>
<div style="text-align: center;">
	<h2>Create New Records</h2>
	<br><br>
</div>

<?php endif ?>
<div class="row justify-content-center">
	
	
	<form action="action.php" method="POST" >
		<input type="hidden" name="id" value="<?php echo $id ?>">
		<div class="row align-items-start">
			<div class="col">
				<div class="form-group">
		<label>First Name</label>
		<input type="textbox" name="fname" class="form-control"  value="<?php echo $fname ?>">
	</div>
	<div class="form-group">
		<label>Middle Name</label>
		<input type="textbox" name="mname" class="form-control" value="<?php echo $mname ?>">
	</div>
	<div class="form-group">
		<label>Last Name</label>
		<input type="textbox" name="lname" class="form-control" value="<?php echo $lname ?>">
	</div>
	<div class="form-group">
		<label>Birthday</label>
		<input type="date" name="bd" class="form-control" value="<?php echo $bd ?>">
	</div>
	<?php if ($updbutton == true): ?>
		<div class="form-group">
		<label>Age</label>
		<input type="text" disabled="disabled" name="age" class="form-control"  value="<?php echo $age ?>">
	</div>
		
	<?php endif ?>
			</div>
			<div class="col">
				<div class="form-group">
					<label>Region</label>
					<select class="form-control" id="region-list" onchange="getregid(this.value);" name="reg" value="<?php echo $region; ?>">
						<option value="<?php if (!empty($region)){echo $region;} ?>">
							<?php if (!empty($region)){echo $region;} ?></option>
						<?php while ($row1 = $result1->fetch_assoc()): ?>
							<option active value="<?php echo $row1['ID']; ?>"><?php echo $row1['Region']; ?></option>
						<?php endwhile;	 ?>
					</select>
				</div>
				<div class="form-group">
					<label>City</label>
					<select class="form-control" id="city-list" name="city" value="<?php echo $city ?>">
						<option value="<?php if (!empty($city)){echo $city;} ?>"><?php if (!empty($city)){echo $city;} ?></option>
						
					</select>
				</div>

				<div class="form-group">
		<label>Address 1</label>
		<input type="textbox" name="addone" class="form-control" value="<?php echo $add2 ?>">
	</div>
	<div class="form-group">
		<label>Address 2</label>
		<input type="textbox" name="addtwo" class="form-control" value="<?php echo $add2 ?>" placeholder="Enter address">		
	</div>
			</div>
		</div>
	

	
	
	
	<div class="form-group" style="text-align: center;">
		<?php if ($updbutton == true): ?>
		<button type="submit" name="upd" class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-up-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2z"/>
</svg> Update</button>
		<?php else: ?>	
		<button type="submit" name="ent" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-up-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2z"/>
</svg> Enter</button>	
		<?php endif; ?>	
	</div>
		
</form>		
</div>

</body>
</html>





<?php 
// for region and city


?>