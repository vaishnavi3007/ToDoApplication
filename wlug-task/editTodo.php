<?php
	include 'dbConnect.php';
	
	if(isset($_GET['id']))
	{
		$editId=$_GET['id'];
		//echo "$editId";
	}

	if(isset($_POST['edit']))
		{
			//echo "$editId";
			$updatedTodo=$_POST['todo'];
            
			$q="UPDATE task SET todo ='$updatedTodo' WHERE id=$editId";
			$result=mysqli_query($con,$q);
			if(!$result)
			{
				die("Failed");
			}
			else
			{
				header("Location:index.php?Updated Successfully");
				echo "<script>alert('Updated Successfully'); <script>";
			}
		}

	

?>
<!DOCTYPE html>
<html>
<head>
	<title>edit TODO</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body><br>

	<?php include "header.html";?>
	<br><br><center><h1>Edit TODO</h1></center><br><br>
	<center>
		<?php
			$q="SELECT * FROM task WHERE id=$editId";
			$result=mysqli_query($con,$q);
			if($result)
				//echo "string";
			// while(mysqli_fetch_assoc($result))
			// {
			//    $row=mysqli_fetch_array($result);
   //          }
             {
             	while ($res = mysqli_fetch_array($result)) { 
                          
                         $row=$res['todo'];            
                     }  
             }
        

		?>
		<form action="#" method="POST">
		<input type="text"  placeholder="Enter updated TODO Name" name="todo" required value="<?php echo $row;?>">
		<br><br>
		<input type="submit" value="EDIT TODO" name="edit">
	</form>

	

</body>
</html>

