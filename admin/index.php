<?php if(!isset($_COOKIE["login"])){header("Location:login.php");}?>
<?php  include("includes/header.php"); ?>


<?php 



//create db object
$db = new Database;
//create query
$query = "select posts.*,categories.name FROM posts 


INNER JOIN categories ON posts.category  = categories.id  ORDER BY posts.title DESC";
$posts = $db->select($query);

$query = 'SELECT * FROM categories';
//run query
$categories = $db->select($query);


?>


<table class="table table-stribed"> 
<tr>
<th>Post ID#</th>

<th>Post Title</th>

<th>Category</th>

<th>Author</th>

<th>Date</th>
  
</tr>


<?php if($posts) { while ($row = $posts->fetch_assoc()) :  ?>
  <tr>
<td><?php echo  $row['id']; ?></td>
<td><a href="edit_post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></td>

<td><?php echo  $row['name']; ?></td>

<td><?php echo $row['author']; ?></td>

<td><?php echo formatDate($row['date']); ?></td>

</tr>
<?php  endwhile; } else {?>

<h3>There is no post in any category</h3>
</table>
<?php } ?>


<table class="table table-striped"> 
<tr>
<th>Category ID</th>

<th>Category Name</th>

</tr>
<?php

 while ($row = $categories->fetch_assoc()):  ?>
<tr>
<td><?php echo  $row['id']; ?></td>
<td><a href="edit_category.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
</tr>
<?php  endwhile; ?>

</table>
<?php  include_once("includes/footer.php"); ?>