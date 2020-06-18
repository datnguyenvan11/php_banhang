<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
    <title>Đăng Nhập - Đăng Ký - Tường An</title>
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
    <script type="text/javascript" src="js/layout.js"></script>
</head>
<body style="background: #f1f2f7;">
<?php
include './includes/menu.php';
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
include 'config.php';
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
    <div class="tieude">
        <div class="jumbotron text-center">
            <h1>HỒ SƠ CÁ NHÂN</h1>
            <p>Bạn có thể thay đổi thông tin cá nhân tại đây</p>
        </div>
    </div> <!-- ketthuctieude -->
<div class="wrap" style="">
    <div class="container profile">
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <div class="thongtincoban">
                    <div class="ngay">
                        <p>Ngày gia nhập</p>
                        <p><?php echo $date ?></p>
                    </div>
                    <img src="upload/<?php echo $avatar ?>">
                    <div class="username"><p><?php echo $username ?></p></div>
                    <div class="chucdanh"><p><span class="<?php echo $img_chucdanh ?>"></span> <?php echo $chucdanh ?>
                        </p></div>
                    <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><span
                                class="fa fa-share-square"></span> Gửi Cảm Nhận
                    </button>
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog" style="color:black">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title" style="color: red;">Gửi Cảm Nhận Của Bạn</h4>
                                </div>
                                <div class="modal-body" style="text-align: left">
                                    <!-- FORM GUI CAM NHAN -->
                                    <div class="form-horizontal row" role="form">
                                        <div class="form-group row">
                                            <label for="input-id" class="col-sm-2 col-form-label text-right">Nội
                                                Dung</label>
                                            <div class="col-sm-10">
                                                <textarea name="txtCamnhan" id="txtCamnhan" class="form-control"
                                                          rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-10 col-sm-offset-2">
                                                <input type="submit" class="btn btn-primary" name="submitCamnhan"
                                                       id="submitCamnhan" value="Đăng">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="" id="errorCamnhan" style="color:red;font-size:20px;text-align:center;">

                                    </div>
                                    <!-- AJAX Xu Li Form  -->
                                    <script type="text/javascript">
                                        $('#submitCamnhan').click(function () {
                                            var dataSend = $('#txtCamnhan').val();
                                            $.ajax({
                                                url: './includes/sendCamnhan.php',
                                                type: 'POST',
                                                dataType: 'text',
                                                data: {txtCamnhan: dataSend},
                                                success: function (data) {
                                                    $('#errorCamnhan').html(data)
                                                    console.log(data);
                                                }
                                            })

                                        });
                                    </script>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!-- enndthongtin -->
            </div> <!-- endcol4 -->

            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="thongtinchinh">
                    <h3>Thông Tin Tài Khoản</h3>
                    <hr class="vien">
                    <p>Họ Tên:<span class="text"><?php echo $name; ?></span></p>
                    <p>Email:<span class="text"><?php echo $email; ?></span></p>
                </div> <!-- endthongtinchinh -->
                <div class="doipass">
                    <h3>Đổi Mật Khẩu</h3>
                    <hr class="vien">
                    <form action="" method="POST" role="form">
                        <div class="form-group">
                            <input type="password" class="form-control" id="" placeholder="Nhập mật khẩu hiện tại"
                                   name="oldpass" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="" placeholder="Nhập mật khẩu mới"
                                   name="newpass" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id=""
                                   placeholder="Nhập lại mật khẩu một lần nữa" name="renewpass" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="btndoiPass">Đổi Mật Khẩu</button>
                        <?php
                        if (isset($_POST['btndoiPass'])) {
                            $username = $_SESSION['username'];
                            $oldpass = $_POST['oldpass'];
                            $oldpass = md5($oldpass);
                            $newpass = $_POST['newpass'];
                            $newpass = md5($newpass);
                            $renewpass = $_POST['renewpass'];
                            $renewpass = md5($renewpass);
                            $query = "SELECT password FROM user WHERE password=?";
                            $stmt = $con->prepare($query);
                            $stmt->bind_param("s", $oldpass);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            if (mysqli_num_rows($result) == 0) {
                                echo '<div class="alert alert-danger text-center">
                                                     <p>Password Cũ Không Đúng</p>
                                                </div>';

                            } else {
                                $query = "Update user Set password=? where username=? ";
                                $stmt = $con->prepare($query);
                                $stmt->bind_param("ss", $newpass, $username);
                                $stmt->execute();
                                $res = $stmt->get_result();
                                echo '<script type="text/javascript">
                                                alert("Đổi Thành Công");
                                        </script>';

                            }

                        }

                        ?>
                    </form>
                </div> <!-- endoipas -->


                <!-- THEM MON HOC -->
                <!-- CHUC NANG THEM BAI HOC -->


                <!-- CHUC NANG KHAC -->

                <?php
                }
                ?>

            </div> <!-- endcol8 -->
        </div> <!-- endrow -->
    </div> <!-- endcontainer -->
</div>
<?php
include('./includes/footer.html');
?>

</body>
</html>
