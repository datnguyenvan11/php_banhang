<script type="text/javascript" src="../js/layout.js"></script>
<?php
if (!isset($_GET['maKHoc']) && !isset($_GET['page'])) {
    echo "Cút";
    echo '<script type="text/javascript">               
                      setTimeout("Redirect1()", 1000);
                   </script>';
} else {

    ?>
    <!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon"/>
    <?php
    include("../config.php");
    $maKHoc = $_GET['maKHoc'];
    $page = $_GET['page'];
    if ($maKHoc == "All") {
        $query = "Select maKHoc,tenKhoa From khoahoc";
        $result = $con->query($query);
        $tenKhoa = "All Khoá";
    } else {
        $query = "Select maKHoc,tenKhoa From khoahoc Where maKHoc=?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $maKHoc);
        $stmt->execute();
        $result = $stmt->get_result();
        $tenKhoa = "";
        $row = $result->fetch_assoc();
        $tenKhoa = $row['tenKhoa'];
    }

    if (!$result->num_rows > 0 || !isset($_GET['page'])) {
        echo '<script type="text/javascript">               
                              setTimeout("Redirect1()", 0);
                           </script>';
    } else {
        include("./menu.php");
        ?>
        <title><?php echo $tenKhoa ?></title>
        <!-- bootstrap3 -->
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/hover_css/hover-min.css">
        <!-- custom-->
        <link rel="stylesheet" type="text/css" href="../css/layout.css">
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        <script src="../css/jquery.min.js"></script>
        <script type="text/javascript">
            function addCart(id) {
                $.ajax({
                    url: '../includes/addCart.php',
                    type: 'GET',
                    dataType: 'text',
                    data: {id: id},
                    success: function (data) {
                        alert("Thêm vào giỏ hàng thành công");
                        $("#number").load("/bankhoahoc/index.php #number")
                    }
                })
            }
            function buy(id) {
                $.ajax({
                    url: '../includes/addCart.php',
                    type: 'GET',
                    dataType: 'text',
                    data: {id: id},
                    success: function (data) {
                       window.location.href="/bankhoahoc/cart.php"
                    }
                })
            }
        </script>
        </head>
        <body style="background: #f3f2f2;">


        <div class="tieude">
            <div class="jumbotron text-center">
                <h1><?php echo $tenKhoa ?></h1>
                <p><a href="../index.php">Trang Chủ </a>| <a
                            href="baihoc.php?maKHoc=<?php echo $maKHoc ?>&page=1"><?php echo $tenKhoa ?></a></p>
            </div>
        </div> <!-- ketthuctieude -->


        <div class="content">
            <div class="container text-center">
                <div class="row">
                    <?php
                    if (isset($_GET['page'])) {
                        $page = (int)$_GET['page'];
                        if ($maKHoc == "All") {
                            $query = "Select id From baihoc";
                            $result = $con->query($query);
                        } else {
                            $query = "Select id From baihoc Where maKHoc=?";
                            $stmt = $con->prepare($query);
                            $stmt->bind_param("s", $maKHoc);
                            $stmt->execute();
                            $result = $stmt->get_result();
                        }
                        $countRecord = mysqli_num_rows($result);
                        $limit = 6;          //tuy chon
                        $countPage = ceil($countRecord / $limit);
                        $start = ($page - 1) * $limit;

                    }
                    ?>
                    <?php
                    if ($maKHoc == "All") {
                        $query = "Select * From baihoc limit ?,?";
                        $stmt = $con->prepare($query);
                        $stmt->bind_param("ii", $start, $limit);
                        $stmt->execute();
                        $result = $stmt->get_result();
                    } else {
                        $query = "Select * From baihoc Where maKHoc=? limit ?,?";
                        $stmt = $con->prepare($query);
                        $stmt->bind_param("sii", $maKHoc, $start, $limit);
                        $stmt->execute();
                        $result = $stmt->get_result();
                    }
                    while ($row = $result->fetch_assoc()) {
                        ?>

                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="thumbnail khoahoc hvr-float" style="width: 350px;height: 450px;">
                                <img src="../img/khoahoc/<?php echo $row['imgBai'] ?>"
                                     style="border-radius: 10px;border: 1px solid #ddd; width: 100%;">
                                <div class="caption">
                                    <h3><a style="text-decoration: none;color: black"
                                           href="chitiet.php?id=<?php echo $row['id'] ?>"><?php echo $row['tenBai'] ?></a>
                                    </h3>
                                    <p>
                                        <span style="font-weight: bold;font-size: 18px; color: red;"><?php echo $row['giatien'] ?> VNĐ</span>
                                    </p>
                                    <p style="font-weight: bold;font-size: 15px; color: red;">
                                        <span>Tác Giả: </span> <?php echo $row['giaovien'] ?>
                                    </p>
                                    <p style="font-weight: bold;font-size: 15px; color: blue;">
                                        <span>Ngày đăng: </span> <?php echo date("d-m-Y", strtotime($row['ngaydang'])) ?>
                                    </p>
                                    <p>
                                        <a href="javascript:buy(<?php echo $row['id'] ?>)" class="btn btn-mua hvr-float-shadow"><span
                                                    class="fa fa-credit-card"></span> Mua</a>
                                        <a href="javascript:addCart(<?php echo $row['id'] ?>)"
                                           class="btn btn-them hvr-float-shadow"><span class="fa fa-plus"></span>
                                            Thêm</a>
                                    </p>
                                </div>
                            </div>
                        </div> <!-- endthum -->
                        <?php
                    }
                    ?>
                </div> <!-- endrow -->
                <ul class="pagination" style="font-size: 30px;">
                    <?php
                    for ($i = 1; $i <= $countPage; $i++) {
                        ?>
                        <li class="<?php if ($i == $page) echo "active" ?>"><a
                                    href="?maKHoc=<?php echo $maKHoc ?>&page=<?php echo $i ?>"><?php echo $i; ?></a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>

            </div> <!-- endcontainer -->
        </div> <!-- endcontent -->

        <?php
        include("../includes/footer.html");

        ?>
        </body>
        </html>
        <?php
    }
}
?>