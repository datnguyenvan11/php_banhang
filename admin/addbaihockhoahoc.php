<?php
session_start();
include_once('checkAdmin.php');

if (!isset($_SESSION['username']))
{
    ?>
    <script type="text/javascript">
        setTimeout('Redirect()', 0);
    </script>
    <?php
}
else
{
include '../config.php';
$username = $_SESSION['username'];
$name = "";
$email = "";
$date = "";
$chucdanh = "";
$avatar = "";
$sql = "Select * From user where username='$username'";
$result = $con->query($sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $username = $row['username'];
        $name = $row['name'];
        $email = $row['email'];
        $date = $row['date'];
        $date = date("d-m-Y", strtotime($date));
        $chucdanh = $row['chucdanh'];
        $img_chucdanh = "";
        $avatar = $row['avatar'];
        $chucdanh = ($chucdanh == 1) ? "Admin" : (($chucdanh == 2) ? "Giảng Viên" : "Học Viên");
        if ($chucdanh == 'Admin') {
            $img_chucdanh = "glyphicon glyphicon-star";
        } else if ($chucdanh == 'Giảng Viên') {
            $img_chucdanh = "glyphicon glyphicon-heart";
        } else {
            $img_chucdanh = "glyphicon glyphicon-user";
        }

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon"/>
    <title>Đăng Nhập - Đăng Ký - Tường An</title>
    <!-- bootstrap3 -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/hover_css/hover-min.css">
    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="../css/layout.css">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <!-- custom js -->
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/hover_css/hover-min.css">
    <link rel="stylesheet" type="text/css" href="../css/csshake-slow.min.css">
    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="../css/layout.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <script src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/layout.js"></script>
</head>
<body style="background: #f1f2f7;">

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><p
                        style="font-size: 20px;color: white;font-family: 'Roboto Condensed', sans-serif;">Admin</p></a>
            <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.php" style="font-family: 'Roboto Condensed', sans-serif;"> <i
                                class="menu-icon fa fa-dashboard"></i>Trung Tâm Quản Lí </a>
                </li>
                <h3 class="menu-title">Các Khoá Học</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a style="font-family: 'Roboto Condensed', sans-serif;" href="addbaihockhoahoc.php" aria-haspopup="true"
                       aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Thêm Khoá Học</a>
                    <a style="font-family: 'Roboto Condensed', sans-serif;" href="khoahoclist.php" aria-haspopup="true"
                       aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Thống Kê Khoá Học</a>

                    <ul class="sub-menu children">
                        <?php
                        $result = mysqli_query($con, "Select maKHOC,imgKHoc From khoahoc Where hide=1");
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <li><i class="<?php echo $row['imgKHoc'] ?>"></i><a
                                        style="font-size: 15px;font-family: 'Roboto Condensed', sans-serif;"
                                        href="baihoc.php?maKHoc=<?php echo $row['maKHOC'] ?>"><?php echo ucwords($row['maKHOC']) ?></a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>


                <h3 class="menu-title">thông tin tài khoản</h3><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a style="font-family: 'Roboto Condensed', sans-serif;" href="userlist.php" aria-haspopup="true"
                       aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Tài Khoản</a>
                    <ul class="sub-menu children ">
                        <li><i class="menu-icon fa fa-envelope-square "></i><a
                                    style="font-family: 'Roboto Condensed', sans-serif;" href="emaillist.php">Email
                                Subcribe</a></li>
                        <li><i class="menu-icon fa fa-comments "></i><a
                                    style="font-family: 'Roboto Condensed', sans-serif;" href="report.php">Duyệt
                                Comment</a></li>
                        <li><i class="menu-icon fa fa-comments "></i><a
                                    style="font-family: 'Roboto Condensed', sans-serif;" href="camnhan.php">Duyệt Cảm
                                Nhận</a></li>
                    </ul>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">

            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks" style="margin-top: 10px;"></i></a>
                <div class="header-left">
                    <button class="search-trigger"><i class="fa fa-search"></i></button>
                    <div class="form-inline">
                        <form class="search-form">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search ..."
                                   aria-label="Search">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>

                </div>
            </div>

            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <a href="#" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="../upload/<?php echo $avatar ?>" alt="User Avatar">
                    </a>
                    <br>
                    <a href="../includes/deletesesion.php">Thoát</a>

                </div>
            </div>
        </div>

    </header><!-- /header -->
    <!-- Header-->


    <div class="wrap" style="">
        <div class="container profile">
            <div class="row">

                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <!-- CHUC NANG ADMIN -->
                    <?php
                    if ($chucdanh == 'Admin') {
                        ?>
                        <div class="themkhoahoc">
                            <h3>Thêm Khoá Học</h3>
                            <hr class="vien">
                            <form action="" method="POST" role="form">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="" placeholder="Nhập mã khoá học"
                                           name="maKHoc" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="" placeholder="Nhập img Ảnh"
                                           name="imgKHoc"
                                           required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="" placeholder="Nhập tên khoá học"
                                           name="tenKhoa" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="" placeholder="Nhập mô tả khoá học"
                                           name="motaKHoc" required>
                                </div>

                                <button type="submit" class="btn btn-primary" name="btnThemKH">Thêm Khoá Học</button>
                            </form>
                        </div> <!-- endthemkhoahoc -->
                        <?php
                        if (isset($_POST['btnThemKH'])) {
                            $maKHoc = $_POST['maKHoc'];
                            $imgKHoc = $_POST['imgKHoc'];
                            $tenKhoa = $_POST['tenKhoa'];
                            $motaKHoc = $_POST['motaKHoc'];
                            $hide = 1;
                            $sql = "INSERT INTO `khoahoc`(`maKHoc`, `imgKHoc`, `tenKhoa`, `motaKHoc`, `hide`) VALUES ('$maKHoc','$imgKHoc','$tenKhoa','$motaKHoc','$hide')";
                            $result = $con->query($sql);
                            if ($result) {
                                echo '  <script type="text/javascript">
                                             alert("Thêm Thành Công!")
                                            </script>';
                            } else {
                                echo '  <script type="text/javascript">
                                             alert("Thêm Thất Bại!")
                                            </script>';
                            }
                        }
                        ?>

                        <?php
                    }
                    }
                    ?>
                    <!-- THEM MON HOC -->
                    <!-- CHUC NANG THEM BAI HOC -->
                    <?php
                    if ($chucdanh == 'Giảng Viên' or $chucdanh == "Admin") {
                        ?>
                        <div class="themkhoahoc">
                            <h3>Thêm Môn Học</h3>
                            <hr class="vien">
                            <form action="" method="POST" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="sel1">Chọn Khoá Học</label>
                                    <select class="form-control" name="maKHoc">
                                        <?php
                                        $query = "Select maKHoc,tenKhoa From khoahoc";
                                        $result = $con->query($query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <option value="<?php echo $row['maKHoc'] ?>"><?php echo $row['tenKhoa']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="" placeholder="Nhập tên giáo viên"
                                           name="giaovien" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="" placeholder="Nhập tên bài học"
                                           name="tenBai" required>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="" placeholder="Nhập Giá Tiền"
                                           name="giatien" required>
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" id="" placeholder="Nhập tên khoá học"
                                           name="imgBai">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="" placeholder="Nhập mô tả bài học"
                                           name="mota" required>
                                </div>
                                <button type="submit" class="btn btn-primary" name="btnThemBH">Thêm Môn Học</button>
                            </form>
                        </div> <!-- endthemkhoahoc -->
                        <?php
                        if (isset($_POST['btnThemBH'])) {
                            $maKHoc = $_POST['maKHoc'];
                            $giaovien = $_POST['giaovien'];
                            $tenBai = $_POST['tenBai'];
                            $mota = $_POST['mota'];
                            $giatien = $_POST['giatien'];
                            $ngaydang = date("Y-m-d");
                            include_once('../lib.php');
                            $imgBai = $_FILES['imgBai'];
                            $nameIMG = "";
                            $hide = 1;
                            if (checkImg($imgBai['size'], $imgBai['name']) == true) {
                                $file = $imgBai['tmp_name'];
                                $nameIMG = getRandom() . $imgBai['name'];
                                move_uploaded_file($file, "img/khoahoc/" . $nameIMG);
                            }
                            $imgBai = $nameIMG;
                            if ($imgBai == "")
                                $imgBai = "default.png";
                            $query = "INSERT INTO `baihoc`(`maKHoc`, `giaovien`, `tenBai`, `giatien`, `imgBai`, `mota`, `hide`, `ngaydang`) VALUES (?,?,?,?,?,?,?,?)";
                            $stmt = $con->prepare($query);
                            $stmt->bind_param("sssissis", $maKHoc, $giaovien, $tenBai, $giatien, $imgBai, $mota, $hide, $ngaydang);
                            $stmt->execute();
                            $res = $stmt->get_result();
                            echo '<script type="text/javascript">
                                     alert("Thành Công");
                                    </script>';
                        }
                        ?>

                        <?php
                    }
                    if ($chucdanh == "Admin") {
                        ?>
                        <!-- CHUC NANG KHAC -->
                        <div class="chucnangkhac">
                            <h3>Chức Năng Khác</h3>
                            <hr class="vien">
                            <a href="admin/userlist.php" class="btn btn-danger hvr-underline-from-center"
                               style="line-height: 24px;">Danh Sách User</a>
                            <a href="admin/khoahoclist.php" class="btn btn-danger hvr-underline-from-center"
                               style="line-height: 30px;">Các Khoá Học</a>
                            <a href="admin/emaillist.php" class="btn btn-danger hvr-underline-from-center"
                               style="line-height: 30px;">Email Đã Đăng Ký</a>
                            <a href="admin/report.php" class="btn btn-danger hvr-underline-from-center"
                               style="line-height: 30px;">Các Phản Hồi</a>

                        </div> <!-- endchucnangkhac -->
                        <?php
                    }
                    ?>

                </div> <!-- endcol8 -->
            </div> <!-- endrow -->
        </div> <!-- endcontainer -->
    </div>
    <?php
    ?>
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
</body>
</html>
