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
            if(!isset($_GET['id']) && !isset($_GET['maKHoc']))
            {
			echo "Cút";
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
			echo "Cút";
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
				echo "Cút";
				echo '<script type="text/javascript">               
				      setTimeout("Redirect1()", 1000);
				   </script>';                              
			}
			else
			{
				include('../config.php');
				$id=$_GET['id'];
				$maKHoc=$_GET['maKHoc'];
				$query="Select * From baihoc Where id='$id'";
				$result=$con->query($query);
                $row= mysqli_fetch_assoc($result);  
                $giaovien=$row['giaovien'];
                $tenBai=$row['tenBai'];	
                $giatien=$row['giatien'];	
                $mota=$row['mota'];	
                $hide=$row['hide'];	
                $ngaydang=date("Y-m-d",strtotime($row['ngaydang']));
	?>
				<div class="well well-lg">
                    <div class="container">
                    	<h3 class="text-center">Chỉnh Sửa Khoá Học</h3>
                    	<h4 class="text-center"><?php echo $maKHoc ?></h3>
                    	<form action="" method="POST" role="form" class="form-horizontal">
                    		<legend>Khoá Học ID : <?php echo $id?></legend>
							  <div class="form-group">
							    <label class="control-label col-sm-2">Giáo Viên</label>
							    <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nhập Tên Giáo Viên" name="giaovien" value="<?php echo$giaovien ?>">
							    </div>
							  </div>
							  <div class="form-group">
							    <label class="control-label col-sm-2">Tên Bài</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" placeholder="Nhập Tên Bài Học" name="tenBai" value="<?php echo$tenBai ?>">
							    </div>
							  </div>
							  <div class="form-group">
							    <label class="control-label col-sm-2">Giá Tiền</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" placeholder="Nhập Tên Giá Tiền" name="giatien" value="<?php echo$giatien ?>">
							    </div>
							  </div>
							  <div class="form-group">
							    <label class="control-label col-sm-2">Mô Tả</label>
							    <div class="col-sm-10">
							      <textarea type="text" class="form-control" placeholder="Nhập Mô Tả " name="mota"><?php echo $mota ?></textarea>
							    </div>
							  </div>
							  <div class="form-group">
							    <label class="control-label col-sm-2">Set Ẩn</label>
							    <div class="col-sm-10">
							      <input type="number" class="form-control" placeholder="Chọn Hide" name="hide" min="0" max="1" value="<?php echo$hide ?>">
							    </div>
							  </div>
							  <div class="form-group">
							    <label class="control-label col-sm-2">Ngày Đăng</label>
							    <div class="col-sm-10">
							      <input type="date" class="form-control" placeholder="Chọn Date" name="ngaydang" value="<?php echo $ngaydang?>">
							    </div>
							  </div>

                    		<button type="submit" class="col-sm-offset-2 btn btn-primary hvr-pulse-grow" name="btnSubmit">Đồng Ý</button>
                    	</form>
                        <?php
                            if(isset($_POST['btnSubmit']))
                            {
                                $giaovien=$_POST['giaovien'];
				                $tenBai=$_POST['tenBai'];	
				                $giatien=$_POST['giatien'];	
				                $mota=$_POST['mota'];	
				                $hide=$_POST['hide'];	
				                $ngaydang=$_POST['ngaydang'];
                                $query="UPDATE baihoc SET `giaovien`=?,`tenBai`=?,`giatien`=?,`mota`=?,`hide`=?,`ngaydang`=? WHERE id=?";
                                $stmt=$con->prepare($query);
                                $stmt->bind_param("ssisisi",$giaovien,$tenBai,$giatien,$mota,$hide,$ngaydang,$id);
                                $stmt->execute();
                                header("location:baihoc.php?maKHoc=$maKHoc");	
                            }
                        ?>
                    </div> <!-- endcontainer -->						
				</div> <!-- endwell -->
                        
	<?php	
			}
		}
            }
	?>
		        						          		
</body>
</html>