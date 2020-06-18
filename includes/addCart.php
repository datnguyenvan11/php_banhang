<?php
ob_start();
session_start();
if (isset($_GET["id"])) {
    $id = $_GET['id'];
    print_r($id);

    include('../config.php');
    $query = "Select  * From baihoc Where id= " . $_GET["id"];
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_row($result);
    if (!isset($_SESSION['cart'])) {
        $cart[$id] = array(
            "id" => $row[0],
            "tenBai" => $row[3],
            "giatien" => $row[4],
            "imgBai" => $row[5],
            "number" => 1,
        );
    } else {
        $cart = $_SESSION['cart'];
        if (array_key_exists($id, $cart)) {
            $cart[$id] = array(
                "id" => $row[0],
                "tenBai" => $row[3],
                "giatien" => $row[4],
                "imgBai" => $row[5],
                "number" => (int)$cart[$id]['number'] + 1,
            );
        } else {
            $cart[$id] = array(
                "id" => $row[0],
                "tenBai" => $row[3],
                "giatien" => $row[4],
                "imgBai" => $row[5],
                "number" => 1,
            );
        }
    }
    $_SESSION["cart"] = $cart;
    print_r($_SESSION["cart"]);

}



?>