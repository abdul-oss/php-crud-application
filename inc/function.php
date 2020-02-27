<?php
function delete_id($id){
    include 'connect.php';        
    try{
        $sql = "DELETE FROM crud WHERE id = ?";   
        $results = $db -> prepare($sql);
        $results -> bindValue(1, $id, PDO::PARAM_INT);
        $results -> execute();
    }catch(PDOException $e){
        echo "data not inserted " . $e -> getMessage();
    }
    return true;
}
    function get_data_id($id){
        include 'connect.php';        
        try{
            $sql = "SELECT id, item, times FROM crud WHERE id = ?";   
            $results = $db -> prepare($sql);
            $results -> bindValue(1, $id, PDO::PARAM_INT);
            $results -> execute();
        }catch(PDOException $e){
            echo "data not inserted " . $e -> getMessage();
        }
        return $results -> fetch();
    }
    function show_data(){
        include 'connect.php';        
        try{
            $sql = "SELECT id, item FROM crud ORDER BY id DESC";
            return $db -> query($sql);
        }catch(PDOException $e){
            echo "connot get data " . $e -> getMessage();
        }
        return true;
    }
    function insert_data($fname, $id = null){
        include 'connect.php';        
        if($id){
            $sql = "UPDATE crud SET item = ? WHERE id = ?";
        }else{  
            $sql = "INSERT INTO crud (item) VALUES (?)";
        }
        try{
            $results = $db -> prepare($sql);
            $results -> bindValue(1, $fname, PDO::PARAM_STR);
            if($id){
                $results -> bindValue(2, $id, PDO::PARAM_INT);
            }
            $results -> execute();
        }catch(PDOException $e){
            echo "data not inserted " . $e -> getMessage();
        }
        return true;
    }
?>