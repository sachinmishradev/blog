
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p><?php echo $about; ?></p>
          </div>
          <div class="sidebar-module">
            <h4>Categories</h4>
            <?php if($categories): ?>
              <?php while($row = $categories->fetch_assoc()): ?>
            <ol class="list-unstyled">
              <li><a href="posts.php?category=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
             <?php endwhile; ?>
            </ol>
          <?php else: ?>
            <h2> There is no categories yet</h2>
            <?php endif; ?>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->


<br>
    <footer class="blog-footer">
      <p>TechDoc blog  &copy; 2017</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>
    </div>

  </body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>
