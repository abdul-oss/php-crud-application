<?php
    try{
        $db = new PDO("mysql:host=localhost;dbname=app","dev","");
        $db -> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }catch(PDOException $e){
        echo "data not connected " . $e -> getMessage();
    }


?>