<?php include('dbBlog.php') ?>
<?php include('header.php') ?>
<?php
        if (isset($_GET['post_id'])) {
            $sql = "SELECT *FROM posts AS p 
            WHERE p.id = {$_GET['post_id']}";
            $statement = $connection->prepare($sql);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $single_post = $statement->fetch();
            
            $sql2 = "SELECT c.autor,c.text, c.post_id FROM comments AS c INNER JOIN posts as p ON c.Post_id = p.id WHERE c.Post_id = {$_GET['post_id']}";
            $statement = $connection->prepare($sql2);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $comments =  $statement->fetchAll();


}?>
<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
        
            <div class="blog-post">
                <a ><h2 class="blog-post-title"><?php echo($single_post['title']);?></h2></a>
                <p class="blog-post-meta"><?php echo($single_post['created_at']); ?><a href="#"><?php echo($single_post['autor']); ?></a></p>
               <p><?php echo ($single_post['body']);?></p>
               <hr>

                    <!-- /////comments//// -->
                   <?php 
                   foreach($comments as $coment){
                    ?>
               <p><?php echo($coment['autor'])." ". ($coment['text']);?></p>
                     <?php }?>
            </div><!-- /.blog-post -->

        
     
            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>
       
        </div><!-- /.blog-main -->

<?php 
require_once("sidebar.php");
?>


</div><!-- /.row -->

</main><!-- /.container -->


<?php 
require_once("footer.php");

?>