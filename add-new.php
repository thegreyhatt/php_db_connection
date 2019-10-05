<?php require "header.php" ?>
<?php require "nav.php" ?>
	
 <main role="main" class="container mt-5" style="padding-top: 20px;">
<div class="row">
	<div class="col-md-6 offset-md-3">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	require 'dbconn.php';

	$uname = $_POST['username'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];

	if (empty($uname) || empty($first_name) || empty($last_name)) {
		echo "All fields are required.";
	}else{
		$sql = "INSERT INTO users (username, first_name, last_name)
		VALUES ('".$uname."', '".$first_name."', '".$last_name."')";

		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}
}
?>
		<form action="add-new.php" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form-control">
			<br>
			<label>First Name</label>
			<input type="text" name="first_name" class="form-control">
			<br>
			<label>Last Name</label>
			<input type="text" name="last_name" class="form-control">
			<br>
			<input type="submit" value="Add New User" >
		</form>
	</div>
</div>
</main>

<?php require "footer.php" ?>