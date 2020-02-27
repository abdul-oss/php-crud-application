<?php
    $pageTitle = 'Item list';

    require 'inc/function.php';

    if(isset($_POST['delete'])){
        if(delete_id(trim(filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_NUMBER_INT)))){
            header('Location: index.php?msg=item+deleted');
            exit;
        }else{
            header('Location: index.php?msg=item+not+deleted');
            exit;
        }
    }
    if(isset($_GET['msg'])){
        $error_msg = trim(filter_input(INPUT_GET, 'msg', FILTER_SANITIZE_STRING));
    }


    include 'inc/header.php';
?>
<div>
<h1> Item list</h1>

    <ul class="display_list">
        <?php
            foreach(show_data() as $row){
                echo "<li class='display_li' >" . "<a href='edit.php?id=" .$row['id'] ."'>" . $row['item'] . "</a> </li>";
                echo "<form method='post' id='form' action='index.php'>"
                   . "<input type='hidden'  name='delete' value='" . $row['id'] . "'>"
                   . "<input type='submit' class='display_delete' value='delete'>"
                   . "</form>";
            }
        ?>
    </ul>
</div>
<?php
    include 'inc/footer.php';
?>