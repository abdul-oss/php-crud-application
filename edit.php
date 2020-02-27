<?php
    
    $pageTitle = $output;
        
    $fname = '';
    require 'inc/function.php';
    if(isset($_GET['id'])){
        list($id, $fname) = get_data_id(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $fname = trim(filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING));
        if(empty($fname)){
            echo " please write some thing";
        }else{
            if(insert_data($fname, $id)){
                header('Location: index.php');
            }else{
                echo "cannot add the item";
            }
        }
    }
    

    include 'inc/header.php';
?>
<h1><?php 
        if(!empty($id)){
            $output= "Edit item";
        }else{ 
            $output= "Add item";
        } 
        echo $output;
    ?>
</h1>
<form method="post" action="./edit.php">
<input type="text" id="fname" name="fname" value="<?php echo $fname; ?>"><br>
<?php
if(!empty($id)){ 
  echo "<input type='hidden'  name='id' value='" . $id . "'><br>"; 
}
?>
<input type="submit"  class="button" value="Submit">
</form> 



<?php
    include 'inc/footer.php';
?>