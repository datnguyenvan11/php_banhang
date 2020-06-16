<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
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
    </head>
<body>

        <?php
        include('./includes/menu.php');
        ?>


    <div class = "top1" >
            <div class="container text-center">
                <p>Mang Cho Bạn Dịch Vụ Tốt Nhất</p>
                <div class="formdk" style="margin-top: 200px;">
                    <form action="" method="POST" role="form" class="form-inline">
                        <legend>Đăng Ký Thành Viên</legend>
                        <div class="form-group">
                            <input type="text" class="form-control input-sm" id="" placeholder="UserName">
                            <input type="password" class="form-control input-sm" id="" placeholder="Password">
                            <input type="email" class="form-control input-sm" id="" placeholder="Email">
                        </div>
                    <a href="dangky_dangnhap.php" class="btn btn-default">Đăng Ký Ngay</a>
                    </form><!-- ketthucformdangky -->
                </div>
             </div>
    </div><!-- end top 1 -->

    <div class="top2">
        <div class="container text-center">
            <h2>2TLND Team</h2>
            <p>WORK HARD, PLAY HARDER</p>
        </div>
    </div><!-- end top 2 -->

    <div class="top3">
        <div class="container">
            <div class="row tieudetop2">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <h2>Các Khoá Học</h2>
                    <hr >
                </div>
            </div><!-- end row tieudetop2 -->
            <div class="row">
            <?php
                    include './config.php';
                    $sql = "Select * From `khoahoc` Limit 4";
                    $result= mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result))
                    {
            ?>


            <?php
               echo     '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center content">
                            <div class="iconto"><div class="'. $row['imgKHoc'] .'"></div></div>
                            <h3>' .$row['tenKhoa']. '</h3>
                            <p>' .$row['motaKHoc']. '</p>
                            <a href="khoahoc/baihoc.php?maKHoc='.$row['maKHoc'].'&page=1" class="btn btn-default nuttrang">Tìm Hiểu Thêm</a>
                        </div>';

                    }

            ?>


            </div> <!-- end row content -->
        </div> <!-- end container -->
    </div> <!-- end top 3 -->


    <div class="top4 anhnen">
        <div class="container text-center">
            <h2>Nhiệt Huyết Và Kinh Nghiệm</h2>
        </div>
    </div><!-- endtop4 -->

    <div class="top5">
       <div class="container">
            <h2>Dịch Vụ Của Chúng Tôi</h2>
            <hr class="vienxanh">
            <div class="sildes">
                <div id="carousel-id" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-id" data-slide-to="0" class=""></li>
                    <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item">
                        <img data-src="holder.js/1920*1080/auto/#777:#7a7a7a/text:First slide" alt="First slide" src="img/portfolio-1.jpeg">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Vì Sức Khỏe Của Bạn</h1>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img data-src="holder.js/1920*1080/auto/#666:#6a6a6a/text:Second slide" alt="Second slide" src="img/portfolio-2.jpeg">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Nâng Cao Chất Lượng Cuộc Sống</h1>
                            </div>
                        </div>
                    </div>
                    <div class="item active">
                        <img data-src="holder.js/1920*1080/auto/#555:#5a5a5a/text:Third slide" alt="Third slide" src="img/portfolio-3.jpeg">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Khỏe Mạnh Yêu Đời</h1>
                            </div>
                        </div>
                    </div>
                </div> <!-- endcarousel -->
                <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
            </div><!-- endsilde -->

            <div class="viewmore"><a href="#" class="btn btn-default">Xem Thêm</a></div>
       </div> <!-- endcontainer -->
    </div><!-- endtop5 -->

        <div class="top6 xanh">
            <div class="container text-center">
                <h2>Đăng Ký </h2>
                <hr size="0">
                <form action="" method="POST" class="form-inline" role="form">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                        <input id="email" type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <button type="submit" class="btn btn-danger hvr-buzz" name="btnSubcribe"><span class="glyphicon glyphicon-send"></span> Đăng Ký Ngay</button>
                </form><!-- ketthucform -->
            </div>
            <?php
                if(isset($_POST['btnSubcribe']))
                {
                    $email = htmlspecialchars(trim($_POST['email']));
                    $query = "Select email From emaildangky Where email=?";
                    $stmt=$con->prepare($query);
                    $stmt->bind_param('s',$email);
                    $stmt->execute();
                    $result=$stmt->get_result();
                    $count=$result->num_rows;
                    if($count<=0)
                    {
                        $hide ="1";
                        $query="INSERT INTO `emaildangky`(`email`, `active`) VALUES ('$email','$hide')";
                        $result=$con->query($query);
                        if($result)
                        {
                            echo '<script>alert("Đăng Ký Thành Công!");</script>' ;
                        }
                        else
                        {
                            echo '<script>alert("Đăng Ký Thất Bại!");</script>' ;
                        }
                    }
                    else
                    {
                            echo '<script>alert("Email Này Đã Đăng Ký!");</script>' ;
                    }

                }
            ?>

        </div> <!-- endtop6 -->

        <div class="bando text-center">
            <div class="container">
                <h2>Tìm Chúng Tôi</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.094353812685!2d105.7943137153656!3d20.988854586019986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc7f3dca9e5%3A0x30cf5a97471f1064!2zVHLGsOG7nW5nIMSQ4bqhaSBI4buNYyBIw6AgTuG7mWkgKEhBTlUp!5e0!3m2!1svi!2s!4v1588669114584!5m2!1svi!2s" width="80%" height="450" frameborder="0" style="border:1" allowfullscreen></iframe>
            </div>
        </div> <!-- endbando -->

        <div class="hocviencmt">
            <div class="container">
                <h2 class="text-center">Brings You To The World</h2>
                <div class="row">
                    <?php
                        $query="Select camnhan.txtCamnhan,user.name,user.avatar From user,camnhan Where user.id=camnhan.idUser and hide = 1 Order by RAND() Limit 3";
                        $result=$con->query($query);
                        while($row=mysqli_fetch_assoc($result))
                        {
                     ?>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <div class="thumbnail">
                            <img src="upload/<?php echo $row['avatar'] ?>" alt="" style="width:80px;height:80px; border-radius:50px ">
                            <div class="caption">
                                <h3 class="modulecaption"><?php echo $row['name'] ?></h3>
                                <p>
                                      <?php echo $row['txtCamnhan'] ?>
                                </p>
                            </div>
                        </div> <!-- endthum -->
                    </div>
                  <?php
                      }
                    ?>



                </div><!-- endorw -->
            </div><!-- endcontainer -->
        </div> <!-- endclasshocvien <-->

        <?php
        include('./includes/footer.html');
        ?>

    </body>
</html>

