<?php
    session_start();
    if(isset($_GET)){
        $id=$_GET['id'];
        unset($_SESSION['cart'][$id]);
        header("location:../cart.php");
        $_SESSION['cart']=array_values($_SESSION['cart']);
    }

 ?>
