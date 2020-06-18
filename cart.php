<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
    <title>Manage Cart</title>
    <!-- bootstrap3 -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="css/hover_css/hover-min.css">
    <!-- custom-->
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <script type="text/javascript" src="js/layout.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#btnSubmit').click(function () {
                var hoten = $('#txtHoten').val();
                var sdt = $('#txtSdt').val();
                $.ajax({
                    url: './includes/addDonhang.php',
                    type: 'GET',
                    dataType: 'json',
                    data: {txtHoten: hoten, txtSdt: sdt},
                    success: function (data) {
                        console.log(data);
                    }
                })

            });
        });
    </script>
</head>
<body>

<?php
include('./includes/menu.php');
?>
<div class="tieude">
    <div class="jumbotron text-center">
        <h1>GIỎ HÀNG</h1>
        <p><a href="./index.php">Trang Chủ </a>| <a href="cart.php">GIỎ HÀNG</a></p>
    </div>
</div> <!-- ketthuctieude -->

<div class="donhang" style="margin-bottom: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <h2 class="text-center">GIỎ HÀNG</h2>
                <table class="table table-hover" id="listcart">
                    <thead>
                    <tr>
                        <th>Tên Khoá</th>
                        <th>Số Lượng</th>
                        <th>Giá Khoá</th>
                        <th>Tổng tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $total = 0;
                    $astotal = 0;
                    if (isset($_SESSION['cart'])) {
                        $cart = $_SESSION['cart'];
                        foreach ($cart as $key => $value) {
                            ?>
                            <tr>
                                <td><?php echo $value['tenBai'] ?></td>
                                <td><input type="number" name="txtGia" onclick="updateCart(<?php echo $key ?>)"
                                           id="num_<?php echo $key ?>" value="<?php echo $value['number'] ?>"></td>
                                <td><?php echo number_format($value['giatien']) ?></td>
                                <td>
                                    <?php
                                    $total = (int)$value["number"] * (int)$value["giatien"];
                                    $astotal += $total;
                                    echo number_format($total)
                                    ?>
                                </td>
                                <td>
                                    <button onclick="deleteCart(<?php echo $key ?>)" id="remove_<?php echo $key ?>"
                                            class="btn btn-success fa fa-remove "> Xoá
                                    </button>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </tbody>

                </table>
                <div
                        id="tong">Tổng tiền: <?php echo number_format($astotal)

                    ?></div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <form action="" method="">
                    <legend>Xác Nhận</legend>
                    <div class="form-group">
                        <label for="">Họ & Tên:</label>
                        <input type="text" class="form-control" id="txtHoten" placeholder="Họ và tên">
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại:</label>
                        <input type="text" class="form-control" id="txtSdt" placeholder="Số điện thoại">
                    </div>
                    <a type="" class="btn btn-primary" style="padding-top: 10px" id="btnSubmit">Gửi</a>
                </form>
            </div>
        </div> <!-- endrow -->
    </div> <!-- endcontainer -->
</div> <!-- enddonghnag -->

<?php
include('./includes/footer.html');
?>
<script>
    function updateCart(id) {
        var num = $("#num_" + id).val();
        $.ajax({
            url: './includes/updatecart.php',
            type: 'GET',
            dataType: 'text',
            data: {"id": id, "num": num},
            success: function (data) {
                $("#listcart").load("/bankhoahoc/cart.php #listcart")
                $("#tong").load("/bankhoahoc/cart.php #tong")

            }
        })

    }

    function deleteCart(id) {
        $.ajax({
            url: './includes/deleteCart.php',
            type: 'GET',
            dataType: 'text',
            data: {"id": id},
            success: function (data) {
                $("#listcart").load("/bankhoahoc/cart.php #listcart")
                $("#tong").load("/bankhoahoc/cart.php #tong")

            }
        })

    }

</script>
</body>
</html>
