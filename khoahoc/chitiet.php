<script type="text/javascript" src="../js/layout.js"></script>
<?php
    if(!isset($_GET['id']))
    {
        echo '<script type="text/javascript">
                      setTimeout("Redirect1()", 0);
                   </script>';
    }
    else
    {
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />
        <?php
            include("../config.php");
            $id=$_GET['id'];
            $query = "SELECT * from baihoc,khoahoc WHERE baihoc.maKHoc=khoahoc.maKHoc and baihoc.id=?";
            $stmt=$con->prepare($query);
            $stmt->bind_param("i",$id);
            $stmt->execute();
            $result= $stmt->get_result();
            $row=$result->fetch_assoc();
            $tenKhoa=$row['tenKhoa'];
            $maKHoc=$row['maKHoc'];
            $giaovien = $row['giaovien'];
            $tenBai = $row['tenBai'];
            $giatien = $row['giatien'];
            $imgBai=$row['imgBai'];
            $mota=$row['mota'];
            $date = date("d-m-Y",strtotime($row['ngaydang']));
            if(!$result->num_rows>0)
            {
                echo '<script type="text/javascript">
                              setTimeout("Redirect1()", 0);
                           </script>';
            }
            else
            {
                include_once("./menu.php");
        ?>
        <title><?php echo $tenKhoa  ?></title>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">
            function addCart(){
              alert("1");
            }
        </script>

    </head>
    <body style="background: #f3f2f2;">
         <div class="tieude">
            <div class="jumbotron text-center">
                <h1 id="chung"><?php echo $tenKhoa ?></h1>
                <p><a href="../index.php">Trang Chủ </a>| <a href="baihoc.php?maKHoc=<?php echo $maKHoc ?>&page=1"><?php echo $tenKhoa?></a></p>
            </div>
        </div> <!-- ketthuctieude -->
        <div class="content" style="padding-bottom: 50px">
            <div class="container">
                <div class="row" >
                    <h1 style="color: red;margin-left: 15px;"><?php echo $tenBai ?></h1>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <img class="img img-responsive" src="../img/khoahoc/<?php echo $imgBai ?>" style="width: 750px;height: 320px">
                        <div class="contentMenu boxshadow">
                            <a href="#chung" class="hvr-underline-from-center">Thông tin chung</a>
                            <a href="#mota" class="hvr-underline-from-center">Mô tả</a>
                            <a href="#phanhoi" class="hvr-underline-from-center">Phản hồi</a>
                            <a href="#footer" class="hvr-underline-from-center">Liên hệ</a>
                        </div>
                        <br id="mota">
                        <div class="box boxshadow"  >
                            <h2 style="color: red" >Mô Tả</h2>
                            <p style="font-size: 20px;"><?php echo $mota ?></p>
                        </div>
                        <br id="phanhoi">
                    <?php
                        $idbaihoc = (int) $id;
                        $query =   "Select name,cmt,avatar,binhluan.date From binhluan,user Where (user.id=binhluan.idUsername and kiemduyet=1 and idbaihoc=?) ORDER BY binhluan.date ASC";
                        $stmt = $con->prepare($query);
                        $stmt->bind_param("i",$idbaihoc);
                        $stmt->execute();
                        $result=$stmt->get_result();
                    ?>
                      <div class="box boxshadow"  >
                          <h2 style="color: red" >Phản hồi</h2>
                          <?php
                            while($row=mysqli_fetch_assoc($result))
                            {
                          ?>
                          <div class="row" style="padding-bottom: 50px">
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                  <img src="../upload/<?php echo $row['avatar'] ?>" style="width:60px;height:60px;border-radius: 50px;text-align: center">
                                  <p class="text-center" style="width: 50px;"><?php echo $row['name'] ?></p>
                            </div>
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                <div class="khungcmt img-responsive">
                                  <p><?php echo $row['cmt'] ?></p>
                                  <p class="date"><?php  echo date(' H:i:s d-m-Y', strtotime($row['date'])); ?></p>
                                </div>
                            </div>
                          </div>
                          <?php
                              }
                              if(!isset($_SESSION['username']))
                              {
                                echo ' <div class="row" style="font-size:20px">
                                          <p>
                                            <a href="../dangky_dangnhap.php">Đăng nhập</a> hoặc <a href="../dangky_dangnhap.php">Đăng ký</a> để bình luân .!
                                          </p>
                                        </div>';
                              }
                              if(isset($_SESSION['username']))
                              {
                                  include_once('./useronline.php');
                                  $info = getInfoUser($_SESSION['username']);
                          ?>
                          <form action="" method="POST" role="form">
                              <div class="row">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                      <img src="../upload/<?php echo $info['avatar'] ?>" style="width:60px;height:60px;border-radius: 50px;text-align: center">
                                      <p class="text-center" style="width: 50px;"><?php echo $info['username'] ?></p>
                                </div>
                                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10" style="margin-left: -10px">
                                  <textarea type="text" class="form-control" id="" placeholder="Bình Luận Của Bạn" style="height: 150px" required="" name="cmt"></textarea>
                                </div>
                              </div>
                              <br>
                              <button type="submit" class="btn btn-primary col-md-offset-2 " name="btnCmt">Gửi</button>
                          </form>
                          <?php
                            }
                          ?>
                      </div>
                    </div>


                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <div class="giatienChitiet boxshadow img-responsive">
                            <h3><?php echo $giatien?> VND</h3>
                            <table class="table table-hover info">
                                <tbody>
                                    <tr>
                                        <td><i class="fa fa-graduation-cap "></i> Khoá học</td>
                                        <td class="con"><?php echo $tenKhoa ?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-users "></i> Giảng viên</td>
                                        <td class="con"><?php echo $giaovien ?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-calendar "></i> Ngày đăng</td>
                                        <td class="con"><?php echo $date; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row text-center">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <a href="#" class="btn btn-mua hvr-float-shadow img-responsive"><span class="fa fa-credit-card"></span> Mua</a>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <a href="#" onclick="addCart()" class="btn btn-them hvr-float-shadow img-responsive"><span class="fa fa-plus"></span> Thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- endcontainer -->
        </div> <!-- endcontent -->
        <?php
            include ("../includes/footer.html");
        ?>
    </body>
</html>
<?php
        }
    }
?>
<?php
    if(isset($_POST['btnCmt']))
    {
      $user = $_SESSION['username'];
      $idUsername = (int) $info['id'];
      $cmt = trim($_POST['cmt']);
      $cmt = htmlspecialchars($cmt);
      $idbaihoc= (int) $id;
      $idmaKHoc=$maKHoc;
      $kiemduyet=0;
      $date = date('Y-m-d H:i:s');
      $query = "INSERT INTO `binhluan`(`idbaihoc`, `idmaKHoc`, `idUsername`, `user`, `cmt`, `date`, `kiemduyet`) VALUES (?,?,?,?,?,?,?)";
      $stmt=$con->prepare($query);
      $stmt->bind_param("isisssi",$idbaihoc,$idmaKHoc,$idUsername,$user,$cmt,$date,$kiemduyet);
      $result=$stmt->execute();
      if($result)
      {
        echo '
        <script type="text/javascript">
          alert("Chờ Phê Duyệt");
          setTimeout(windows.reload(),1000)
        </script>  ';

      }
    }
?>
