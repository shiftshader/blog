<?php
    $servername = "127.0.0.1";
    $username = "john";
    $password = "";
    $dbname = "blog_yt";

    try {
        $connection = new PDO(
            "mysql:host=$servername;dbname=$dbname", $username, $password
        );
       
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
?>