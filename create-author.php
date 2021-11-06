<?php
require("dbBlog.php");
require("header.php");
if(isset($_POST['submit'])){
    $ime = $_POST["ime"];
    $prezime = $_POST["prezime"];
    $pol = $_POST["pol"];
    if(empty($ime) || empty($prezime) || empty($pol) ){
      echo "<div class='container'><span style='font-size:2rem;'>Unesite podatke u sva polja</span>
      <br>
      <br>
      <hr>
      <br>
      <a href='create-author.php'><button class='btn btn-danger'>Nazad</button><a/>
      </div>";
       return;
    }else{
        $sql = "INSERT INTO author (ime,prezime,pol) VALUES ('$ime', '$prezime', '$pol')";
        $statement = $connection->prepare($sql);
        $statement->execute();
    }
}
?>
<div class="container">
<form action = "create-author.php" method="POST" id="postsForma" >
        <input type="text" name="ime" placeholder="Ime" id="ime" class="form-control"></input><br>
        <input type="text" name="prezime" placeholder="Prezime" id="prezime" class="form-control"></input><br>
        <div class="form-check">
            <p>izaberite pol</p>
  <input class="form-check-input" type="radio" name="pol" id="muskiPost" value="muski" checked>
  <label class="form-check-label" for="exampleRadios1">
    Muski
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="pol" id="zenskiPost" value="zenski">
  <label class="form-check-label" for="exampleRadios2">
   Zenski
  </label>
</div>
        <button name="submit" type="submit" name="submit" class="btn btn-success">Submit</button>
        <br>
        <br>
        <br>
    </form>
</div>
<?php
require("footer.php");
?>