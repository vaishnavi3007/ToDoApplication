<?php
		
	// for Mysql connection 
	include 'dbConnect.php';


	//for fetching all records from database
	$q="SELECT * FROM task";
	$result=mysqli_query($con,$q);



	//code for inserting new records to the database
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$todoName=$_POST['todo'];
		//echo "$todo_name";

		$q="INSERT INTO task(todo) VALUES('$todoName')";
		$result=mysqli_query($con,$q);
		if(!$result)
		{
			die("Failed");
		}
		else
		{
			header("Location:index.php?Added successfully");
			echo "<script> alert('ADDED Successfully');</script>";//why not working 
		}
	}



	//for deleting existing records from database 
	if(isset($_GET['id']))
	{
		$deleteId=$_GET['id'];
		//echo $deleteId;
		$q="DELETE FROM task WHERE id = $deleteId";
		$result=mysqli_query($con,$q);
		if(!$result)
		{
			die("Failed");
		}
		else
		{
			header("Location:index.php?deleted Successfully");
			echo "<script> alert('DELETED Successfully');</script>";//why not working 
		}
		
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>index page</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<br>
	<?php include "indexheader.html";?>
	<br><br><center><h1>ADD TODO</h1></center><br><br>
	<center>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<input type="text" name="todo" placeholder="TODO NAME" required>
		<br><br>
		<input type="submit" value="ADD TODO" class="btn btn-primary btn-lg">
	</form></center>
	<br><br>
	<!--form action="search.php" method="POST">
		&nbsp&nbsp&nbsp&nbsp<input type="text" name="searchTodo">
		&nbsp&nbsp&nbsp<input type="submit" name="search" value="SEARCH TODO">
	</form-->

	<br><br>
	
		<div class="Container">
			<div class="row">
				<div class="col-lg-2">
				</div>
				<div class="col-lg-8">
					<center>
					<table border="1" class="table">
		<thead>
			<th>ID</th>
			<th>TODO</th>
			<th>EDIT TODO</th>
			<th>DELETE TODO</th>
		</thead>
			<tbody>
				
					<?php
							while ($row=mysqli_fetch_assoc($result)) {
								$id=$row['id'];
								$todo=$row['todo'];
					?>
								<tr>
									<td><?php echo $id; ?></td>
									<td><?php echo $todo; ?></td>
									<td><a href="editTodo.php?id=<?php echo $id; ?>" class="btn btn-info">Edit todo</td>
									<td><a href="index.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete todo</td>
			   					</tr>
			   		<?php
							}

					?>

					
			</tbody>
	</table></center>
	
	
				</div>
			</div>
		</div>
		
</html>