<?php if(!isset($_COOKIE["login"])){header("Location:login.php");}?>
<?php  include_once("includes/header.php") ?>


<?php 
$id = $_GET['id'];
$db = new Database();

//create query
$query = 'SELECT * FROM categories WHERE id = '.$id;
//run query
$category = $db->select($query)->fetch_assoc();
//create query

$query = "SELECT * FROM categories";
$categories = $db->select($query);
?>



<?php
if(isset($_POST['submit'])) {
	$name = mysqli_real_escape_string($db->link,$_POST['name']);
	

	// Validation
	if($name == '' )
	{
		//set error
		$error = 'fill out required fields';

	}
	else {
		$query = "UPDATE categories
		SET 
		name = '$name'
		
		WHERE id=".$id;
		$update_row = $db->update($query);
	/*****************/
//alert


if($query){ ?>


<div class="alert alert-success alert-dismissable" >Record Updated!
<button class="close" data-dismiss='alert' aria-label='close' ><span aria-hidden='true'>&times;</span></button>
</div>


<?php header("Refresh:3;url=index.php"); }
 




/*********************/

	}
}

?>

<?php
if(isset($_POST['delete'])) {
		//call delete
	$query = "Delete from categories where id=".$id;
	$delete_row = $db->delete($query);
	/*****************/
//alert


if($query){ ?>


<div class="alert alert-success alert-dismissable" >Record Deleted !
<button class="close" data-dismiss='alert' aria-label='close' ><span aria-hidden='true'>&times;</span></button>
</div>


<?php header("Refresh:3;url=index.php"); }
 




/*********************/
}
?>

<form role='form' method="post" action="edit_category.php?id=<?php echo $id; ?>">
<div class="form-group">
<label>Category Name</label>
<input type="text" name="name" required class="form-control" placeholder="Enter Category" value="<?php echo $category['name']; ?>">	
</div>
<div>
<input name="submit" type="submit" class="btn btn-primary" value="submit">
<a href="index.php" name="cancel" class="btn btn-default">Cancel</a>
<input name="delete" type="submit" class="btn btn-danger" value="Delete">
</div>
</form>

<?php  include_once("includes/footer.php") ?>