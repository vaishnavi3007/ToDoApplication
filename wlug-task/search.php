<?php
		
	// for Mysql connection 
	include 'dbConnect.php';

	//$search=0;
	//for fetching all records from database
	
	if(isset($_POST['search']))
	{ 
		$search=$_POST['searchTodo'];

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>index page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<br>
	<?php include "header.html";?>
	<br><br>
		<div class="Container">
			<div class="row">
				<div class="col-lg-2">
				</div>
				<div class="col-lg-8">
						<table border="1" class="table">
								<thead>
									<th>ID</th>
									<th>TODO</th>
									<th>EDIT TODO</th>
									<th>DELETE TODO</th>
								</thead>
									<tbody>


										
											<?php

													$q="SELECT * FROM task WHERE todo LIKE '%$search%'";
													//echo "$q";
													$result=mysqli_query($con,$q);

													if(mysqli_num_rows($result)==0)
													{
														echo "<tr><td></td><td></td>";
														echo "<td><h1>NO RESULT FOUND</h1></td><td></td>";
													}else
													{
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

											
													}?>
													

											
										</tbody>
							</table>
				</div>
			</div>
		
		</div>
	
</body>
</html>