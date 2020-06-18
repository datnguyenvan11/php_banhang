<script type="text/javascript" src="../js/layout.js"></script>
<?php 
session_start();
include_once('checkAdmin.php');
if(!isset($_SESSION['username']))
    {
        echo '<script type="text/javascript">
                          setTimeout("Redirect1()", 1000);
                       </script>';
    }
else{
    if(__checksesion($_SESSION['username'])==false)
    {
                        echo '<script type="text/javascript">
                              setTimeout("Redirect1()", 1000);
                           </script>';
    }
    else
    {
?>
<?php
    include('../config.php');
    //Lay thong tin admin
    $query = "Select username,avatar From user Where username=?";
    $stmt= $con->prepare($query);
    $stmt->bind_param("s",$_SESSION['username']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row=$result->fetch_assoc();
    $username = $row['username'];
    $avatar = $row['avatar'];  
    $maKHoc = $_GET['maKHoc'];
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>        <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quản Lí</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="../css/layout.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">



</head>
<body style=>
        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><p style="font-size: 20px;color: white;font-family: 'Roboto Condensed', sans-serif;"> Admin</p></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"  style="font-family: 'Roboto Condensed', sans-serif;"> <i class="menu-icon fa fa-dashboard"></i>Trung Tâm Quản Lí </a>
                    </li>
                    <h3 class="menu-title">Các Khoá Học</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a style="font-family: 'Roboto Condensed', sans-serif;" href="addbaihockhoahoc.php" aria-haspopup="true"
                           aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Thêm Khoá Học</a>
                        <a style="font-family: 'Roboto Condensed', sans-serif;" href="khoahoclist.php"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop" ></i>Thống Kê Khoá Học</a>
                        <ul class="sub-menu children">
                            <?php
                                $result=mysqli_query($con,"Select maKHOC,imgKHoc From khoahoc Where hide=1");
                                while($row = mysqli_fetch_assoc($result))
                                {
                            ?>
                            <li><i class="<?php echo $row['imgKHoc'] ?>"></i><a style="font-size: 15px;font-family: 'Roboto Condensed', sans-serif;" href="baihoc.php?maKHoc=<?php echo $row['maKHOC'] ?>"><?php echo ucwords($row['maKHOC']) ?></a></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </li>
                    <h3 class="menu-title">thông tin tài khoản</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a  style="font-family: 'Roboto Condensed', sans-serif;" href="userlist.php" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Tài Khoản</a>
                        <ul class="sub-menu children ">
                            <li><i class="menu-icon fa fa-envelope-square "></i><a  style="font-family: 'Roboto Condensed', sans-serif;" href="emaillist.php">Email Subcribe</a></li>
                            <li><i class="menu-icon fa fa-comments "></i><a  style="font-family: 'Roboto Condensed', sans-serif;" href="report.php">Duyệt Comment</a></li>
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
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#"  aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="../upload/<?php echo $avatar ?>" alt="User Avatar">
                        </a>
                        <br>
                        <a href="../includes/deletesesion.php">Thoát</a>

                    </div>                 
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="container">
                <div class="timkiem">
                <form action="" method="POST" class="form-inline text-center" role="form">
                    <div class="form-group row">
                        <input type="text" class="form-control col-xs-10 col-sm-10 col-md-10 col-lg-10 " id="" placeholder="Nhập username cần tìm" size="140" name="searchKey">
                        <button type="submit" class="btn btn-danger hvr-underline-reveal col-xs-2 col-sm-2 col-md-2 col-lg-2" name="btnSearch">Tìm Kiếm</button>
                    </div>
                </form>

            <?php
                if(isset($_POST['btnSearch']))
                {
                    $key = "%{$_POST['searchKey']}%";
                    $query=($key=="")?"Select * From baihoc Where maKHoc=?":"Select * From baihoc Where maKHoc=? and tenBai like ?";
                    $stmt=$con->prepare($query);
                    if($key!="")
                    {
                        $stmt->bind_param("ss",$maKHoc,$key);
                    }
                    else
                    {
                        $stmt->bind_param("s",$maKHoc);
                    }
                    $stmt->execute();
                    $result=$stmt->get_result();
                }
                else
                {
                    $query="Select * From baihoc Where maKHoc=?";
                    $stmt=$con->prepare($query);
                    $stmt->bind_param("s",$maKHoc);
                    $stmt->execute();
                    $result=$stmt->get_result();
                }
            ?>

        <div class="container">
            <div class="table table-responsive">
                    <h2><?php echo $maKHoc?></h2>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Gíao Viên</th>
                                <th>Tên Bài</th>
                                <th>Giá Tiền</th>
                                <th>Ảnh</th>
                                <th>hide</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($row=mysqli_fetch_assoc($result))
                                {
                            ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['giaovien'] ?></td>
                                <td><?php echo $row['tenBai'] ?></td>
                                <td><?php echo $row['giatien'] ?></td>
                                <td><img src="../img/khoahoc/<?php echo $row['imgBai'] ?>" style="width: 80px;height: 50px"></td>
                                <td><?php echo $row['hide'] ?></td>
                                <td><?php echo date("d-m-Y",strtotime($row['ngaydang'])) ?></td>
                                <td><a class="btn btn-success" href="EditBaihoc.php?id=<?php echo $row['id']?>&maKHoc=<?php echo $maKHoc?>">Sửa</a></td>
                                <td>
                                    <button id="deletekhoahoc_<?php echo $row['id'] ?>"
                                            class="btn btn-warning delete-khoahoc">Xoá
                                    </button>
                                </td>
                                                         </tr>
                                <?php
                                    }
                                ?>
                        </tbody>
                    </table>
            </div>
        </div> <!-- endcontainer -->
            

        </div> <!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Right Panel -->
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
            <script>
                jQuery('.delete-khoahoc').click(function () {
                    if (confirm('Bạn có chắc muốn xóa không?')) {
                        var deleteId = jQuery(this).attr('id').replace('deletekhoahoc_', '');
                        jQuery.ajax({
                            url: '/bankhoahoc/admin/deleteBaihoc.php?id=' + deleteId,
                            method: 'GET',
                            success: function () {
                                alert('Xóa thành công!');
                                window.location.reload();
                            },
                            error: function () {
                                alert('Có lỗi xảy ra, vui lòng thử lại sau.');
                            }
                        });
                    }
                });
            </script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

</body>
</html>
<?php }} ?>