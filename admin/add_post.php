<?php if(!isset($_COOKIE["login"])){header("Location:login.php");}?>
<?php  include_once("includes/header.php"); ?>

<?php
$db = new Database();
if(isset($_POST['submit'])) {
	$title = mysqli_real_escape_string($db->link,$_POST['title']);
	$body = mysqli_real_escape_string($db->link,$_POST['body']);
	$category = mysqli_real_escape_string($db->link,$_POST['category']);
	$author = mysqli_real_escape_string($db->link,$_POST['author']);
	$tags = mysqli_real_escape_string($db->link,$_POST['tags']);


	 $_FILES['ffilename']['name'];
	 $_FILES['ffilename']['tmp_name'];
	 $_FILES['ffilename']['size'];
	$targetDir = '../images/';
	$integrity = uniqid();
	$targetFile = $targetDir.$integrity.basename($_FILES['ffilename']['name']);
	$mov = move_uploaded_file($_FILES['ffilename']['tmp_name'],$targetFile);
	

	// validation
	if($title == '' || $body == '' || $category == '' || $author == '')
	{
		//set error
		$error = 'fill out required fields';

	}
	else {
		$query = "INSERT INTO posts 
				(title,post_image,body,category,author,tags)
					VALUES ('$title','$targetFile','$body',$category,'$author','$tags')";

		$insert_row = $db->insert($query);
		/*****************/
//alert


if($query){ ?>


<div class="alert alert-success alert-dismissable" >Record Added !
<button class="close" data-dismiss='alert' aria-label='close' ><span aria-hidden='true'>&times;</span></button>
</div>


<?php header("Refresh:3;url=index.php"); }
 




/*********************/
			}
}

?>



<?php

//$id = $_GET['id'];

//create query
$query = 'SELECT * FROM categories';
//run query
$categories = $db->select($query);
 ?>

<form role='form' method="post" action="add_post.php" enctype="multipart/form-data">
<div class="form-group">
<label>POST TITLE</label>
<input type="text" name="title" class="form-control" placeholder="Enter Post Title">	
</div>
<div class="form-group">
<label>POST Body</label>
<textarea class="form-control" name="body"  placeholder="Enter Post Title"></textarea>
</div>
<div class="form-group">
	<label>SELECT CATEGORY</label>
	<select class="form-control" name="category">
		<?php while($row = $categories->fetch_assoc()): ?>
			<?php 
			if ($row['id']==$post['category']) {
				$selected = 'selected';
			}
			else {
				$selected = '';
			}
			?>
		<option <?php echo $selected ?> value="<?php echo $row['id']; ?>"><?php echo  $row['name']; ?></option>
	<?php  endwhile; ?>
	</select>
</div>
<div class="form-group">
	<label>AUTHOR</label>
	<input type="text" name="author"  class='form-control' placeholder="Enter author Ename">
</div>
<div class="form-group">
	<label>TAGS</label>
	<input type="text" name='tags' placeholder="Enter Tags" class="form-control">
</div>
<div class="form-group">
			<input type="file" class="form-control" name="ffilename"/>
</div>

<div>
<input name="submit" type="submit" class="btn btn-primary" value="submit">
<a href="index.php" name="cancel" class="btn btn-danger">Cancel</a>
</div>


</form>
<?php  include_once("includes/footer.php"); ?>