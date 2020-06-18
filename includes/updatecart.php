<?php
ob_start();
session_start();
include('../config.php');

if (isset($_GET["id"]) && isset($_GET["num"])) {
    $id = $_GET["id"];
    $num = $_GET["num"];
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
        if (array_key_exists($id, $cart)) {
            if ($num) {
                $cart[$id] = array(
                    "id" => $cart[$id]["id"],
                    "tenBai" => $cart[$id]["tenBai"],
                    "giatien" => $cart[$id]["giatien"],
                    "imgBai" => $cart[$id]["imgBai"],
                    "number" => (int)$num,
                );
            } else {
                unset($cart[$id]);
            }
            $_SESSION['cart'] = $cart;

        }

    }
}
?>
