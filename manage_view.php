<?php
include_once("./database/constants.php");
if (!isset($_SESSION["userid"])) {
	header("location:".DOMAIN."/");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Point Of Sale System</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	<script type="text/javascript" src="./js/main.js"></script>
 </head>
<body>
	<?php include_once("./templates/header.php"); ?>
	<br/><br/>
	<div class="container">
		<div class="card-body">
				
			<?php
					$connection=mysqli_connect("localhost","root","");
					$db=mysqli_select_db($connection,'project_inv');
					$query="SELECT * FROM user";
					$query_run=mysqli_query($connection,$query);
			?>	
			<table class="table">
			  <thead class="thead-dark">
				<tr>
				  <th scope="col">Id</th>
				  <th scope="col">User Name</th>
				  <th scope="col">Email</th>
				  <th scope="col">Password</th>
				  <th scope="col">Type</th>
				  <th scope="col">Date</th>
				  <th scope="col">Last Login</th>
				</tr>
			  </thead>
			  <?php
					if($query_run)
					{
						foreach($query_run as $row)
						{
				?>
			  <tbody>
				<tr>
				  <td><?php echo $row['id']; ?></td>
				  <td><?php echo $row['username']; ?></td>
				  <td><?php echo $row['email']; ?></td>
				  <td><?php echo $row['password']; ?></td>
				  <td><?php echo $row['usertype']; ?></td>
				  <td><?php echo $row['register_date'];?></td>
				  <td><?php echo $row['last_login']; ?></td>
			  </tbody>
			  <?php
						}
					}
					else
					{
						echo "No Record Found";
					}
				?>
			</table>
		</div>
	</div>
</body>
</html>
