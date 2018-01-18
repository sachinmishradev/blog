<?php if(!isset($_COOKIE["login"])){header("Location:login.php");}?>
<?php  include_once("includes/header.php"); ?>


<?php 

$db = new Database();
$id = $_GET['id'];
//create query
$query = 'SELECT * FROM posts WHERE id = '.$id;
//run query
$post = $db->select($query)->fetch_assoc();
//create query

$query = "SELECT * FROM categories";
$categories = $db->select($query);
?>



<?php
if(isset($_POST['submit'])) {
	$title = mysqli_real_escape_string($db->link,$_POST['title']);
	$body = mysqli_real_escape_string($db->link,$_POST['body']);
	$category = mysqli_real_escape_string($db->link,$_POST['category']);
	$author = mysqli_real_escape_string($db->link,$_POST['author']);
	$tags = mysqli_real_escape_string($db->link,$_POST['tags']);

	// validation
	if($title == '' || $body == '' || $category == '' || $author == '')
	{
		//set error
		$error = 'fill out required fields';

	}
	else {
		$query = "UPDATE posts 
		SET 
		title = '$title',
		body = '$body',
		category = '$category',
		author = '$author',
		tags = '$tags'
		WHERE id=".$id;
;
		$update_row = $db->update($query);


		/*****************/
//alert


if($query){ ?>


<div class="alert alert-success alert-dismissable" >Record Updated !
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
	$query = "Delete from posts where id=".$id;
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

<form role='form' method="post" action="edit_post.php?id=<?php echo $id ?>">
<div class="form-group">
<label>POST TITLE</label>
<input type="text" name="title" class="form-control" placeholder="Enter Post Title" value="<?php echo $post['title']; ?>">	
</div>
<div class="form-group">
<label>POST Body</label>
<textarea class="form-control" name="body"  placeholder="Enter Post Title"><?php echo $post['body']; ?></textarea>
</div>
<div class="form-group">
	<label>SELECT CATEGORY</label>
	<select class="form-control" name="category">
		<?php while($row = $categories->fetch_assoc()): ?>
			<?php 
			if ($row['id']==$post['category']){
				$selected = 'selected';
			}
			else {
				$selected = '';
			}
			?>
		<option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>> <?php echo  $row['name']; ?></option>
	<?php  endwhile; ?>
	</select>
</div>
<div class="form-group">
	<label>AUTHOR</label>
	<input type="text" name="author"  class='form-control' placeholder="Enter author Ename" value="<?php echo $post['author']; ?>">
</div>
<div class="form-group">
	<label>TAGS</label>
	<input type="text" name='tags' placeholder="Enter Tags" class="form-control" value="<?php echo $post['tags']; ?>">
</div>
<div>
<input name="submit" type="submit" class="btn btn-primary" value="submit">
<a href="index.php" name="cancel" class="btn btn-default">Cancel</a>
<input name="delete" type="submit" class="btn btn-danger" value="Delete">
</div>


</form>
<?php  include_once("includes/footer.php"); ?>