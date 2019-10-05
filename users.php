<?php require "header.php" ?>

<?php require 'nav.php';  ?>

<br>
<?php
require 'dbconn.php';

$sql = "SELECT id, username, first_name, last_name FROM users";
$result = $conn->query($sql);

?>

<?php if ($result->num_rows > 0) { ?>
	<main role="main" class="container mt-5" style="padding-top: 20px;">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<table class="table table-hover">
				<thead>
					<tr>
						<td>ID</td>
						<td>Username</td>
						<td>First name</td>
						<td>Last name</td>
					</tr>
				</thead>
				<tbody>
					<?php
						 while($row = $result->fetch_assoc()) {
					       echo "<tr>";
					       echo "<td>".$row['id']."</td>";
					       echo "<td>".$row['username']."</td>";
					       echo "<td>".$row['first_name']."</td>";
					       echo "<td>".$row['last_name']."</td>";
					       echo "</tr>";
					    }
					?>
				</tbody>
			</table>
		</div>
	</div>
	</main>

<?php
	} else { 
    echo "0 results";
	$conn->close();
	}
?>
<?php require 'footer.php';  ?>