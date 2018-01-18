
<?php include('includes/header.php') ?>
<?php

$id = $_GET['id'];
//create db object
$db = new Database();
//create query
$query = 'SELECT * FROM posts where id='.$id;
//run query
$post = $db->select($query)->fetch_assoc();
//create query
$query = 'SELECT * FROM categories';
//run query
$categories = $db->select($query);
 ?>
  <div class="col-sm-8 blog-main">
   <div class="blog-post text-justify">

            <h2 class="blog-post-title"><?php echo $post['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($post['date']); ?>  by <a href="#"><?php echo $post['author']; ?> </a></p>
            <p >
      <!--      <img src='<?php echo $post["post_image"]; ?>' style="padding-bottom:10%; width:100%;border-radius:2%;" class="img img-responsive" /> -->
            
            <?php echo $post['body']; ?>
            </p>
           
          </div>
          </div>

<?php include('includes/footer.php') ?>