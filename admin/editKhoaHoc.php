<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="../img/favicon.ico" type="/image/x-icon" />
        <title>Admin-KhoaHoc</title>
        <!-- bootstrap3 -->
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">	
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>	
        <link rel="stylesheet" type="text/css" href="../css/hover_css/hover-min.css">
        <!-- custom css -->
        <link rel="stylesheet" type="text/css" href="../css/layout.css">
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        <script type="text/javascript" src="../js/layout.js"></script>
</head>
<body style="background: #f3f2f2;>
	<?php
            if(!isset($_GET['id']))
            {
			echo '<script type="text/javascript">               
				      setTimeout("Redirect1()", 1000);
				   </script>';                 
            }
            else
            {
        ?>
        
	<?php
        session_start();
		if(!isset($_SESSION['username']))
		{
			echo '<script type="text/javascript">               
				      setTimeout("Redirect1()", 1000);
				   </script>';  			
		}
		else
		{
            include('checkAdmin.php');
			$username=$_SESSION['username'];
			if(__checksesion($username)==false)
			{
				echo '<script type="text/javascript">               
				      setTimeout("Redirect1()", 1000);
				   </script>';
			}
			else {
                include('../config.php');
                $id = $_GET['id'];
                $query = "Select * From khoahoc Where id='$id'";
                $result = $con->query($query);
                $row = mysqli_fetch_assoc($result);
                $imgKHoc = $row['imgKHoc'];
                $tenKhoa = $row['tenKhoa'];
                $motaKhoc = $row['motaKHoc'];
                $hide = $row['hide'];
                $maKHoc = $row['maKHoc'];

            }
	?>
				<div class="well well-lg">
                    <div class="container">
                    	<h3 class="text-center">Chỉnh Sửa Khoá Học</h3>
                    	<form action="" method="POST" role="form" class="form-horizontal">
                    		<legend>Khoá Học ID : <?php echo $id?></legend>
							  <div class="form-group">
							    <label class="control-label col-sm-2">Mã Khoá Học</label>
							    <div class="col-sm-10">
                                                                <input type="text" class="form-control" placeholder="Nhập Mã Khoá Học" name="maKHOC" value="<?php echo$maKHoc ?>">
							    </div>
							  </div>
							  <div class="form-group">
							    <label class="control-label col-sm-2">Code ảnh khoá</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" placeholder="Nhập IMG Khoá Học" name="imgKHOC" value="<?php echo$imgKHoc ?>">
							    </div>
							  </div>
							  <div class="form-group">
							    <label class="control-label col-sm-2">Tên Khoá</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" placeholder="Nhập Tên Khoá Học" name="tenKhoa" value="<?php echo$tenKhoa ?>">
							    </div>
							  </div>
							  <div class="form-group">
							    <label class="control-label col-sm-2">Mô Tả Khoá</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" placeholder="Nhập Mô Tả Khoá Học" name="mota" value="<?php echo$motaKhoc ?>">
							    </div>
							  </div>
							  <div class="form-group">
							    <label class="control-label col-sm-2">Set Ẩn</label>
							    <div class="col-sm-10">
							      <input type="number" class="form-control" placeholder="Chọn Hide" name="hide" min="0" max="1" value="<?php echo$hide ?>">
							    </div>
							  </div>
                    		<button type="submit" class="col-sm-offset-2 btn btn-primary hvr-pulse-grow" name="btnSubmit">Đồng Ý</button>
                    	</form>
                        <?php
                            if(isset($_POST['btnSubmit']))
                            {
                                $maKHoc=$_POST['maKHOC'];
                                $imgKHoc=$_POST['imgKHOC'];
                                $tenKhoa=$_POST['tenKhoa'];
                                $motaKhoc=$_POST['mota'];
                                $hide=$_POST['hide'];
                                $query="UPDATE `khoahoc` SET `maKHoc`=?,`imgKHoc`=?,`tenKhoa`=?,`motaKHoc`=?,`hide`=? WHERE id=?";
                                $stmt=$con->prepare($query);
                                $stmt->bind_param("ssssii",$maKHoc,$imgKHoc,$tenKhoa,$motaKhoc,$hide,$id);
                                $stmt->execute();
                                header("location:khoahoclist.php");

                            }
                        ?>
                    </div> <!-- endcontainer -->
				</div> <!-- endwell -->

	<?php
			}

            }
	?>


				        						          		
</body>
</html>