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
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
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
                <a class="navbar-brand" href="./"><p style="font-size: 20px;color: white;font-family: 'Roboto Condensed', sans-serif;">Admin</p></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"  style="font-family: 'Roboto Condensed', sans-serif;"> <i class="menu-icon fa fa-dashboard"></i>Trung Tâm Quản Lí </a>
                    </li>
                    <h3 class="menu-title">Các Khoá Học</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
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
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks" style="margin-top: 10px"></i></a>
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

                        <div class="table table-responsive">
                            <table class="table table-hover ">
                                <h3>Danh Sách User</h3>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Date</th>
                                        <th>Chucdanh</th>
                                        <th>Active</th>
                                        <th>Ảnh</th>
                                    </tr>
                                </thead>
                                    <?php
                                        if(isset($_POST['btnSearch']))
                                        {
                                            $key="";
                                            $key = "{$_POST['searchKey']}%";
                                            $query=($key=="")?"Select * From user":"Select * From user Where username like ?";
                                            $stmt=$con->prepare($query);
                                        if($key!="")
                                        {
                                          $stmt->bind_param("s",$key);
                                        }
                                            $stmt->execute();
                                            $result=$stmt->get_result();
                                        }
                                        else
                                        {
                                            $query="Select * From user ";
                                            $result = $con->query($query);
                                        }
                                    ?>
                            <tbody>
                                <?php
                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                 ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><?php echo $row['password'] ?></td>
                                    <td><?php echo $date=date("d-m-Y",strtotime($row['date'])) ?></td>
                                    <td><?php echo $row['chucdanh'] ?></td>
                                    <td><?php echo $row['active'] ?></td>
                                    <td><img src="../upload/<?php echo $row['avatar'] ?>" style="width:30px;height: 30px;border-radius: 50px"></td>
                                    <td><a href="" class="btn btn-success" data-toggle="modal" data-target="#myModal<?php echo $row['id']?>">Sửa</a></td>
                                </tr>
                            <!-- Modal -->
                            <div id="myModal<?php echo $row['id'] ?>" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Edit User:<b><?php echo $row['username'] ?></b></h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    
                                  </div>
                                  <div class="modal-body">
                                        <form action="" method="POST" role="form">
                                            <div class="form-group">
                                                <label for="">Cấp Quyền</label>
                                                <select style="margin-left: 10px" name="chucdanh" >
                                                  <option value="1" <?php if($row['chucdanh']==1)echo "selected" ?>>Admin</option>
                                                  <option value="2" <?php if($row['chucdanh']==2)echo "selected" ?>>Giảng Viên</option>
                                                  <option value="3" <?php if($row['chucdanh']==3)echo "selected" ?>>Học Viên</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Active</label>
                                                <input <?php if($row['active']==1) echo "checked" ?> type="checkbox" name="active" value="1" style="margin-left: 35px">
                                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                            </div>
                                            <button type="submit" class="btn btn-primary" name="btnSubmit">Đồng Ý</button>
                                        </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                                <?php
                                        }
                                    if(isset($_POST['btnSubmit']))
                                    {
                                        $chucdanh = $_POST['chucdanh'];
                                        $active = (!isset($_POST['active']))?0:1;
                                        $id = $_POST['id'];
                                        $query = "UPDATE `user`  SET  `chucdanh`=?,`active`=? WHERE id=?";
                                        $stmt=$con->prepare($query);
                                        $stmt->bind_param("iii",$chucdanh,$active,$id);
                                        $stmt->execute();
                                         echo '
                                                    <script type="text/javascript">
                                                        setTimeout('.'ReloadTrang("userlist.php")'.', 0);
                                                    </script>  ';
                                    }

                                 ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- endcontainer -->
            </div><!-- endtimkiem -->
            

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