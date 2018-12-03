
</div><!-- /.blog-main -->

<aside class="col-md-4 blog-sidebar">
    <div class="p-3 mb-3 bg-light rounded">
        <h4 class="font-italic">About</h4>
        <p class="mb-0"><?php  echo $about;?> </p>
    </div>

    <div class="p-3">
        <h4 class="font-italic">Categories</h4>
        <?php if($catagries) : ?>
        <ol class="list-unstyled mb-0">
            <?php while($row = $catagries->fetch_assoc()) : ?>
                <li><a href="posts.php?catagries=<?php echo ($row['id']);?>"><?php echo $row['name'];?></a></li>
            <?php endwhile; ?>
        </ol>
        <?php else: ?>
          <p>ther is no catagreis </p>
        <?php endif; ?>
    </div>

</aside><!-- /.blog-sidebar -->

</div><!-- /.row -->

</main><!-- /.container -->

<footer class="blog-footer">
    <p>MyBlog &copy; 2018 </p>
    <p> <a href="#">Back to top</a></p>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-3.1.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/jquery-3.1.1.min.js"><\/script>')</script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/holder.min.js"></script>
<script>
    Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
    });
</script>
</body>
</html>