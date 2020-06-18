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
    //reset thong tin online
    $time = time();
    $query ="Delete From `online` Where `time`+5*60 < ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i",$time);
    $stmt->execute();
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
    <link rel="stylesheet" type="text/css" href="../css/csshake-slow.min.css">
    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="../css/layout.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
	<script src="../js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          $.ajax({
            url: './includes/getInfo.php',
            dataType: 'json',
            success : function(data){
              $('#userOnline').html(data.countOnline);
              $('#countCourse').html(data.coutCourse);
              $('#countBaihoc').html(data.countBaihoc);
              $('#userReg').html(data.countUser);
            }
          })

          $.ajax({
            url: './includes/getOnline.php',
            dataType: 'text',
            success : function(data){
              $('#online').html(data);
            }
          })

          $.ajax({
            url: './includes/getTopCmt.php',
            dataType: 'text',
            success : function(data){
              $('#topCmt').html(data);
            }
          })
              $.ajax({
                url: './includes/getCmt.php',
                dataType: 'json',
                success : function(data){
                  $('#thongbao').html(data.xhtml);
                  $('#countCmtchuaduyet').html(data.countCmt);

                }
              })          
          setInterval(function(){
              $.ajax({
                url: './includes/getInfo.php',
                dataType: 'json',
                success : function(data){
                  $('#userOnline').html(data.countOnline);
                  $('#countCourse').html(data.coutCourse);
                  $('#countBaihoc').html(data.countBaihoc);
                  $('#userReg').html(data.countUser);
                }
              })

              $.ajax({
                url: './includes/getOnline.php',
                dataType: 'text',
                success : function(data){
                  $('#online').html(data);
                }
              })

              $.ajax({
                url: './includes/getTopCmt.php',
                dataType: 'text',
                success : function(data){
                  $('#topCmt').html(data);
                }
              })

              $.ajax({
                url: './includes/getCmt.php',
                dataType: 'json',
                success : function(data){
                  $('#thongbao').html(data.xhtml);
                  $('#countCmtchuaduyet').html(data.countCmt);

                }
              })
          }, 3000);
        });
    </script>


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
                            <li><i class="menu-icon fa fa-comments "></i><a  style="font-family: 'Roboto Condensed', sans-serif;" href="camnhan.php">Duyệt Cảm Nhận</a></li>
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
                        <h1>Thông Báo: <span class="badge badge-danger hvr hvr-buzz" style="font-size: 18px" id="countCmtchuaduyet"></span> <a href="report.php" data-toggle="modal" data-target="#myModal">Comment chưa duyệt </a></h1>
                        <!-- The Modal -->
                        <div class="modal fade" id="myModal">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">Comment Chưa Duyệt</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              <!-- Modal body -->
                              <div class="modal-body"  id="thongbao">


                              </div>

                              <!-- Modal footer -->
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>

                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="content mt-3">

            <div class="row">
                <!-- Begin Thong ke -->
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="thongke1">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <span class="fa fa-home fa-5x"></span>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <p class="thongkeTieude">Số Người Online:</p>
                                <p class="thongkeContent" id="userOnline"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Thong Ke -->
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="thongke2">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <span class="fa fa-trophy fa-5x "></span>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <p class="thongkeTieude">Tổng Khoá Học:</p>
                                <p class="thongkeContent" id="countCourse"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Thong Ke -->
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="thongke3">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <span class="fa fa-gratipay  fa-5x"></span>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <p class="thongkeTieude">Tổng Bài Học:</p>
                                <p class="thongkeContent" id="countBaihoc"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Thong Ke -->
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="thongke4">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <span class="fa fa-telegram   fa-5x"></span>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <p class="thongkeTieude">Số User Đăng Ký:</p>
                                <p class="thongkeContent" id="userReg"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Thong Ke -->

            </div>

            <div class="row" style="margin-top: 50px">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="">
                    <h3 class="text-center" style="color: #33E1BA;">♥ Top Comment 3 ♥</h3>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Tên</th>
                                    <th>Số CMT</th>
                                </tr>
                            </thead>
                            <tbody id="topCmt">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <h3 class="text-center" style="color: red">Online User</h3>
                    <div class="container">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>IP</th>
                                    <th>URL</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody id="online">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>




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
