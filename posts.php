<?php include('dbBlog.php') ?>
<?php include('header.php') ?>
<?php
                $sql = "SELECT id, title, body, author, created_at FROM posts ORDER BY created_at DESC " ;
                $statement = $connection->prepare($sql);
                $statement->execute();
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                $posts = $statement->fetchAll();

            
      $pol="SELECT *
      FROM author
      INNER JOIN posts
      ON posts.author = author.ime+ author.prezime;";
      $testpol = $connection->prepare($pol);
      $testpol->execute();
      $statement->setFetchMode(PDO::FETCH_ASSOC);
      $polget = $testpol->fetchAll();
      $style='';

      foreach($polget as $pol1){
        if ($post['author']= $pol1['ime'].' '. $pol1['prezime'] && $pol1['pol']== 'muski'){
            $style='style="color:blue"';
        }else{
            $style='style=color:red"';
        }   

      }

    

?>
<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
        <?php
            foreach ($posts as $post) {

                
              




         ?>
            <div class="blog-post">
                <a href="single-post.php?post_id=<?php echo$post['id'] ;?>"><h2 class="blog-post-title"><?php echo($post['title']);?></h2></a>
                <p class="blog-post-meta"><?php echo($post['created_at']) ." "; ?><a  <?php echo $style; ?> href="#"><?php echo($post['author']); ?></a></p>
               <p><?php echo ($post['body']);?></p>
            </div><!-- /.blog-post -->
     
            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>
        <?php
            }
        ?>
        </div><!-- /.blog-main -->
        <?php include('sidebar.php') ?>
    </div><!-- /.row -->
</main><!-- /.container -->
<?php include('footer.php') ?>