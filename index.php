<?php include('includes/header.php'); ?>

<?php
//create db object
$db = new Database();
//create query
$query = 'SELECT * FROM posts ORDER BY id desc';
//run query
$posts = $db->select($query);
//create query
$query = 'SELECT * FROM categories';
//run query
$categories = $db->select($query);
//Limit select  query 
$queryl = 'SELECT * FROM posts ORDER BY id desc LIMIT 4 ';
//run query
$postsl = $db->select($queryl);
 ?>

<?php if ($postsl) : ?>
  <div class="col-sm-8 blog-main">
  <?php while($row   =  $postsl->fetch_assoc()): ?>

        
          <div class="blog-post" >

            <h2 class="blog-post-title"><?php echo $row['title'];?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']); ?>  by <a href="mailto:sachinmishra199747@gmail.com"><?php echo $row['author']; ?> </a></p>
            <p >
          <!--  <img src='<?php echo $row["post_image"]; ?>' style="padding-bottom:10%; width:100%;border-radius:2%;" class="img img-responsive" />  -->
            <?php echo shortenText($row['body']); ?>
            </p>
            <a class="readmore" href="post.php?id=<?php  echo urlencode($row['id']);?>">read more</a>
          </div>
          <?php endwhile; ?><!-- /.blog-post -->
          </div><!-- /.blog-main -->

     <?php    include('includes/footer.php'); ?>
<?php else : ?>


<div class="col-sm-8 blog-main">

<h2>There are no posts yet </h2>
</div>

  <?php
include('includes/footer.php');
endif;
?>