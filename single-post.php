<?php include('dbBlog.php') ?>
<?php include('header.php') ?>
<?php
        if (isset($_GET['post_id'])) {
            $sql = "select a.pol, p.id, p.title, p.body, p.author, p.created_at, p.author_id from posts as p left join author as a on p.author_id=a.id where p.id = {$_GET['post_id']}";
            $statement = $connection->prepare($sql);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $single_post = $statement->fetch();
            
            $sql2 = "SELECT c.author,c.text, c.post_id FROM comments AS c INNER JOIN posts as p ON c.post_id = p.id WHERE c.post_id = {$_GET['post_id']}";
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
                <p class="blog-post-meta"><?php echo($single_post['created_at'])." "; ?><a <?php 
                 $switch=$single_post['pol'];

                 switch($switch){
                     case "muski":
                         echo 'style="color:blue"';
                         break;
                     case "zenski":
                         echo 'style="color:purple"';
                         break;
                 }
                
                
                
                ?> href="#"><?php echo($single_post['author']); ?></a></p>
               <p><?php echo ($single_post['body']);?></p>
               <hr>

                    <!-- /////comments//// -->
                   <?php 
                   foreach($comments as $coment){
                    ?>
               <p><?php echo($coment['author']).": "."'". ($coment['text'])."'";?></p>
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