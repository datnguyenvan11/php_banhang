<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
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
            $(document).ready(function() {
              $('#btnSubmit').click(function() {
                  var hoten=$('#txtHoten').val();
                  var sdt=$('#txtSdt').val();
                  $.ajax({
                    url: './includes/addDonhang.php',
                    type: 'GET',
                    dataType: 'json',
                    data: {txtHoten:hoten,txtSdt:sdt},
                    success:function(data){
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
                <h1>Thanh Toán</h1>
                <p><a href="./index.php">Trang Chủ </a>| <a href="cart.php">Thanh Toán</a></p>
            </div>
        </div> <!-- ketthuctieude -->

        <div class="donhang" style="margin-bottom: 50px;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <h2 class="text-center">Thanh Toán</h2>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên Khoá</th>
                                    <th>Số Lượng</th>
                                    <th>Giá Khoá</th>
                                    <th>Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(isset($_SESSION['cart']))
                            {
                                foreach ($_SESSION['cart'] as $key => $value) {
                             ?>
                                <tr>
                                    <td><?php echo $key ?></td>
                                    <td><?php echo $value['tenBai'] ?></td>
                                    <td><input type="number" name="txtGia" value="1"></td>
                                    <td><?php echo $value['giatien'] ?></td>
                                    <td>40000</td>
                                    <td><a href="./includes/deleteCart.php?id=<?php echo $key ?>" class="btn btn-success fa fa-remove"> Xoá</a></td>
                                </tr>
                            <?php
                                }
                            }
                             ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <form action="" method="" >
                            <legend>Xác Nhận</legend>
                            <div class="form-group">
                                <label for="">Họ & Tên:</label>
                                <input type="text" class="form-control" id="txtHoten" placeholder="Họ và tên">
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại:</label>
                                <input type="text" class="form-control" id="txtSdt" placeholder="Số điện thoại" >
                            </div>
                            <a type="" class="btn btn-primary" id="btnSubmit">Gửi</a>
                        </form>
                    </div>
                </div> <!-- endrow -->
            </div> <!-- endcontainer -->
        </div> <!-- enddonghnag -->

        <?php
        include('./includes/footer.html');
        ?>

    </body>
</html>
