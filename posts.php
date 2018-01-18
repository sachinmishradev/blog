<?php include('includes/header.php'); ?>

<div class="text-center " style="background-color:#bdc3c7" > <h2>All POSTS</h2></div>
<?php

$db = new Database();
//url check
if(isset($_GET['category'])){
  $category = $_GET['category'];
  $db = new Database();

//create query
$query = 'SELECT * FROM posts where category='.$category;
//run query
$posts = $db->select($query);

}else
{



$query = 'SELECT * FROM posts';
//run query
$posts  = $db->select($query);
}


//create query

$name = 'SELECT * FROM categories';
//run query
$categories = $db->select($name);
 ?>

<?php if($posts): ?>
  <div class="col-sm-8 blog-main">

  <?php while($row   =  $posts->fetch_assoc()): ?>

        
          <div class="blog-post">

            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']); ?>  by <a href="#"><?php echo $row['author']; ?> </a></p>
            <p >
           <img src='<?php echo $row["post_image"]; ?>' style="width:100%;padding-bottom:10%;" class="img img-responsive" />  
            <?php echo shortenText($row['body']); ?>
            </p>
            <a class="readmore" href="post.php?id=<?php  echo urlencode($row['id']);?>">read more</a>
          </div>
          <?php endwhile; ?><!-- /.blog-post -->
          </div><!-- /.blog-main -->

         
        
      
<?php
include('includes/footer.php');

?>
<?php   else : ?>



<?php 
 //personal  database
$host = 'localhost';
$name = 'root';
$password = '';
$db_name = 'blog';
$con = mysqli_connect($host,$name,$password,$db_name);
$catquery = 'select * from categories where id='.$category;
$cat = mysqli_query($con,$catquery);
$catname = mysqli_fetch_assoc($cat);

//End of query!

?>







<div class="col-sm-8 blog-main">

  <h2>There are no posts yet in  <?php echo $catname['name']; ?></h2>
  </div>
  <?php
include('includes/footer.php');
endif;
?>
