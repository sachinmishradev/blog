<?php  include('../config/config.php'); ?>
<?php include('../libraries/Database.php');?>
<?php  include('../helpers/format_helper.php');?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 , user-scalable=no,max-initial-width=1.0,min-initial-width=1.0">

<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

 <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 <link rel="stylesheet" type="text/css" href="css/custom.css">

<script src="https://use.fontawesome.com/fc3e85f604.js"></script>

    <title> Sachin's Blog </title>

<style type="text/css">
  .blog-nav-item{font-family:Montserrat;color:#fff;}

  .blog-nav-item:hover{font-family:cursive;color:#fff;text-decoration:underline;}

  .blog-nav-item:active{text-decoration:underline;}

</style>

  </head>

  <body>

    <div class="blog-masthead" >
      <div class="container">
        <nav class="blog-nav " >
          <a class="blog-nav-item active" href="index.php">Dashboard</a>
          <a class="blog-nav-item" href="add_post.php">Add Post</a>
          <a class="blog-nav-item" href="logout.php">Logout</a>
          <a class="blog-nav-item" href="add_category.php">Add Category</a>
          <a class="blog-nav-item pull-right" href="http://localhost/phploversblog">Visit Blog</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="row blog-header headr">
      <h2>Admin Area</h2>
        </div>
        <div class="row">
          <div class="col-sm-12 blog-main">
            

