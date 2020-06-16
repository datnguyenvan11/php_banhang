<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
        <title>Đăng Nhập - Đăng Ký </title>
        <!-- bootstrap3 -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="css/hover_css/hover-min.css">
        <!-- custom css -->
        <link rel="stylesheet" type="text/css" href="css/layout.css">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        <!-- custom js -->
        <script type="text/javascript">
            $(document).ready(function(){
                $("#myModal").modal('show');
            });
        </script>
    </head>
    <body>
        <?php
        include './includes/menu.php';
        include 'config.php';
        ?>

        <div class="tieude">
            <div class="jumbotron text-center">
                <h1>ĐĂNG NHẬP - ĐĂNG KÝ</h1>
                <p>Bạn có thể đăng nhập và đăng ký tại đây</p>
            </div>
        </div> <!-- ketthuctieude -->

        <div class="formdangky_dangnhap">
            <div class="container">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#dangnhap"><span class="fa fa-lock"></span>
                                    Đăng Nhập vào tài khoản của bạn</a>
                            </h4>
                        </div>
                        <div id="dangnhap" class="panel-collapse collapse in">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-push-3 col-sm-push-3 col-md-push-3 col-lg-push-3 ">
                                    <form action="" method="POST" role="form">
                                        <legend>Đăng Ký</legend>
                                        <div class="form-group">
                                            <label for="">TÊN ĐĂNG NHẬP:</label>
                                            <input type="text" class="form-control" id="" placeholder="Username" name="username" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">MẬT KHẨU:</label>
                                            <input type="password" class="form-control" id="" placeholder="Password" name="password" required="">
                                        </div>

                                        <button type="submit" class="btn btn-primary hvr-underline-reveal" name="btnDangnhap">Đăng Nhập</button>
                                    </form>
                                </div>

                            </div> <!-- ketthucdangnhap -->
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                    <span class="fa fa-users"></span> Đăng Ký vào tài khoản của bạn</a>
                            </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                            <div id="collapse1" class="panel-collapse collapse in">
                                <div class="row">

                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-push-3 col-sm-push-3 col-md-push-3 col-lg-push-3 ">
                                        <form action="dangky_dangnhap.php" method="POST" role="form" enctype="multipart/form-data">
                                            <legend>Đăng Ký</legend>
                                            <div class="form-group">
                                                <label for="">TÊN CỦA BẠN:</label>
                                                <input type="text" class="form-control" id="" placeholder="Nhập Họ Tên" required="" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="">EMAIL:</label>
                                                <input type="email" class="form-control" id="" placeholder="Nhập email" required="" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="">TÊN ĐĂNG NHẬP:</label>
                                                <input type="text" class="form-control" id="" placeholder="Nhập tên đăng nhập" required="" name="username">
                                            </div>
                                            <div class="form-group">
                                                <label for="">MẬT KHẨU:</label>
                                                <input type="password" class="form-control" id="" placeholder="Nhập mật khẩu" required="" name="password">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Avatar:</label>
                                                <input type="file" class="form-control" id="avatar" placeholder="anhdaidien" name="avatar">
                                            </div>
                                            <div class="form-group">
                                                <label for="">NHẬP LẠI MẬT KHẨU:</label>
                                                <input type="password" class="form-control" id="" placeholder="Nhập lại mật khẩu" required="" name="repassword">
                                            </div>

                                            <button type="submit" class="btn btn-primary hvr-underline-reveal" name="btnDangky">Đăng Ký</button>
                                        </form>
                                    </div>

                                </div> <!-- ketthucdangky -->
                            </div>
                        </div>
                    </div>
                                            <?php                                                       //code xu li dang ky tai khoan
                                                  if(isset($_POST['btnDangky']))
                                                    {
                                                        include_once('regular.php');
                                                        if(!isset($_POST['name']) || !isset($_POST['email'])
                                                           || !isset($_POST['username']) || !isset($_POST['password']))
                                                            echo 	'<div class="alert alert-danger">
                                                                        Chưa có đủ thông tin
                                                                        </div>';
                                                        else if(checkEmail($_POST['email'])==false){
                                                          echo 	'<div class="alert alert-danger">
                                                                      Email không hợp lệ
                                                                      </div>';
                                                        }
                                                        else
                                                        {
                                                          include_once('./lib.php');

                                                          $name = htmlspecialchars(trim($_POST['name']));
                                                          $email = htmlspecialchars(trim($_POST['email']));
                                                          $username = htmlspecialchars(trim($_POST['username']));
                                                          $password = md5($_POST['password']);
                                                          $avatar=$_FILES['avatar'];
                                                          $nameIMG="";
                                                          if(checkImg($avatar['size'],$avatar['name'])==true)
                                                          {
                                                            $file=$avatar['tmp_name'];
                                                            $nameIMG=getRandom().$avatar['name'];
                                                            move_uploaded_file($file,"upload/".$nameIMG);
                                                          }
                                                          $avatar=$nameIMG;
                                                          $date = date("Y-m-d");
                                                          $chucdanh="3";
                                                          $active="1";
                                                          $check = "SELECT username, password FROM user WHERE username='$username'";
                                                          $query = mysqli_query($con,$check);
                                                          if (mysqli_num_rows($query)>0)
                                                          {
                                                             echo "Tên đăng nhập này đã có người dùng";
                                                          }

                                                          else
                                                          {
                                                              if($avatar=="")
                                                              {
                                                                $avatar="default.png";
                                                              }
                                                              $sql ="INSERT INTO `user`(`name`, `email`, `username`, `password`, `avatar`, `date`, `chucdanh`,`active`) VALUES ('$name','$email','$username','$password','$avatar','$date','$chucdanh','$active')";
                                                              $res = $con->query($sql);
                                                              if($res)
                                                                echo 	'<div class="alert alert-success text-center">
                                                                        <p>Đăng Ký Thành Công</p>
                                                                        </div>';
                                                              else
                                                              {
                                                                  echo 	'<div class="alert alert-danger text-center">
                                                                        <p>Đăng Ký Thất Bại</p>
                                                                        </div>';
                                                              }
                                                          }



                                                        }
                                                    }
                                            ?>

                                            <?php                                 //code xu li dang nhap tai khoan
                                                if(isset($_POST['btnDangnhap']))
                                                {

                                                    if(!isset($_POST['username']) || !isset($_POST['password']))
                                                    {
                                                        echo 'Chua nhap du thong tin';
                                                    }
                                                    else
                                                    {
                                                        $username =$_POST['username'];
                                                        $password =md5($_POST['password']);
                                                        $query ="SELECT username, password FROM user WHERE username=? and active=1";
                                                        $stmt=$con->prepare($query);
                                                        $stmt->bind_param('s',$username);
                                                        $stmt->execute();
                                                        $result=$stmt->get_result();
                                                        $rowscount=mysqli_num_rows($result);
                                                        if ($rowscount <= 0) {
                                                        echo '<div id="myModal" class="modal fade">
                                                                <div class="modal-dialog">
                                                                     <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <p class="h2 text-center" style="color: red;"><span class="fa fa-ban fa-2x"></span>Tài Khoản Không Đúng.Hoặc Chưa Active</p>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                            </div>';
                                                            exit;
                                                        }
                                                        $row = mysqli_fetch_array($result);
                                                        if ($password != $row['password'])
                                                        {
                                                        echo '<div id="myModal" class="modal fade">
                                                                <div class="modal-dialog">
                                                                     <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <p class="h2 text-center" style="color: red;"><span class="fa fa-ban fa-2x"></span>Tài Khoản Không Đúng</p>

                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                            </div>';
                                                           exit;
                                                        }
                                                        else
                                                        {

                                                        $_SESSION['username']=$username;

                                                        echo '<div id="myModal" class="modal fade">
                                                                <div class="modal-dialog">
                                                                     <div class="modal-content">
                                                                        <div class="modal-body">
                                                                        <p class="text-center" style="color:#077F80;">Đăng Nhập Thành Công!</p>
                                                                        <div class="sk-cube-grid">
                                                                          <div class="sk-cube sk-cube1"></div>
                                                                          <div class="sk-cube sk-cube2"></div>
                                                                          <div class="sk-cube sk-cube3"></div>
                                                                          <div class="sk-cube sk-cube4"></div>
                                                                          <div class="sk-cube sk-cube5"></div>
                                                                          <div class="sk-cube sk-cube6"></div>
                                                                          <div class="sk-cube sk-cube7"></div>
                                                                          <div class="sk-cube sk-cube8"></div>
                                                                          <div class="sk-cube sk-cube9"></div>
                                                                        </div>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                            </div>';
                                                ?>

                                                    <script type="text/javascript">
                                                        function Redirect() {
                                                           window.location="index.php";
                                                        }
                                                        setTimeout('Redirect()', 2000);
                                                    </script>

                                                    <?php
                                                            }
                                                        }
                                                    }

                                                ?>

                </div>
            </div> <!-- end container -->
        </div> <!-- endform -->

        <?php
        include('./includes/footer.html');
        ?>

    </body>
</html>
