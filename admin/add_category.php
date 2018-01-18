<?php if(!isset($_COOKIE["login"])){header("Location:login.php");}?>
<?php  include_once("includes/header.php") ?>


<?php
$db = new Database();
if(isset($_POST['submit'])) {
	$name = mysqli_real_escape_string($db->link,$_POST['name']);
	
	// validation
	if($name == '')
	{
		//set error
		$error = 'fill out required fields';

	}
	else {
		$query = "INSERT INTO categories 
				(name)
					VALUES ('$name')";

		$update_row = $db->update($query);	
/*****************/
//alert


if($query){ ?>


<div class="alert alert-success alert-dismissable" > Record Added!
<button class="close" data-dismiss='alert' aria-label='close' ><span aria-hidden='true'>&times;</span></button>
</div>


<?php header("Refresh:3;url=index.php"); }
 




/*********************/
	}
}


?>

<form role='form' method="post" action="add_category.php">
<div class="form-group">
<label>Category Name</label>
<input type="text" name="name" class="form-control" placeholder="Enter Category">	
</div>
<div>
<input name="submit" type="submit" class="btn btn-primary" value="submit">
</div>
</form>

<?php  include_once("includes/footer.php") ?>