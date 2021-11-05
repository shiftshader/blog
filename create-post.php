<?php
require("dbBlog.php");
require("header.php");
if(isset($_POST['submit'])){
    $body = $_POST["body"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $currentDate =  date("Y-m-d");
    if(empty($author) || empty($body) || empty($title) ){
         echo('Nesto nije u redu');
        return;
    }else{
        $sql = "INSERT INTO posts (title,body,author,created_at) VALUES ('$title', '$body', '$author', '$currentDate')";
        $statement = $connection->prepare($sql);
        $statement->execute();
    }
}
?>
<div class="container">
<form action = "create-post.php" method="POST" id="postsForma" >
        <input type="text" name="title" placeholder="Title" id="titlePosts" class="form-control"></input><br>
        <input type="text" name="author" placeholder="Author" id="authorPosts" class="form-control"></input><br>
        <textarea name="body" placeholder ="Enter Post" rows = "10" id="bodyPosts" class="form-control"></textarea><br>
        <button name="submit" type="submit" name="submit" class="btn btn-success">Submit</button>
        <br>
        <br>
        <br>
    </form>
</div>
<?php
require("footer.php");
?>