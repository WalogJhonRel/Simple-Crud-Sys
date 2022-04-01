<html>
<?php  $mysqli = new mysqli('localhost', 'root', '', 'crud_walog') or die(mysqli_error($mysqli));
			$result3 = $mysqli->query("SELECT * from city WHERE RegionID='".$_POST['regid']."'") or die($mysqli->error);

 ?>
<option value="">Choose City...</option>
<?php while ($row = $result3->fetch_assoc()): ?>
							<option value="<?php echo $row['City']; ?>"><?php echo $row['City']; ?></option>
						<?php endwhile;	 ?>
</html>