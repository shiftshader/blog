<?php
require("dbBlog.php");
require("header.php");
////// author// select

$sql2 = "SELECT id, ime, prezime, pol FROM author";
$statement2 = $connection->prepare($sql2);
$statement2->execute();
$statement2->setFetchMode(PDO::FETCH_ASSOC);
$authors = $statement2->fetchAll();





if(isset($_POST['submit'])){
    $body = $_POST["body"];
    $title = $_POST["title"];
    $currentDate =  date("Y-m-d");
    $selected=$_POST["author"];
    $author = preg_replace('/[0-9]+/', '', $selected);
    $author_id= intval($selected);
    


    if(empty($author) || empty($body) || empty($title) ){
       echo "<div class='container'><span style='font-size:2rem;'>Unesite podatke u sva polja</span>
       <br>
       <br>
       <hr>
       <br>
       <a href='create'><button class='btn btn-dark'>Nazad</button><a/>
       </div>";
        return;
    }else{
        $sql = "INSERT INTO posts (title,body,author,created_at, author_id) VALUES ('$title', '$body', '$author', '$currentDate','$author_id')";
        $statement = $connection->prepare($sql);
        $statement->execute();
        header("Location: ./create-post.php"); 
    }
}


?>
<div class="container">
<form action = "create-post.php" method="POST" id="postsForma" >
        <input type="text" name="title" placeholder="Title" id="titlePosts" class="form-control"></input><br>
        <select name="author" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
    <option value=''>Choose...</option>


        <?php foreach($authors as $autor){
?>


    <option value="<?php echo $autor['id']." ".$autor['ime'] . " " . $autor['prezime'];?>"><?php echo $autor['ime'] . " " . $autor['prezime'];?></option>
  <?php } ?>
  </select><br>
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