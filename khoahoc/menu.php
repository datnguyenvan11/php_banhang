<?php 
    include('./useronline.php');
    userOnline();
	session_start();
	session_regenerate_id();
    include '../config.php';
?>
	<div class="menu">
		<nav class="navbar navbar-default navbar-fixed-top " role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
		 			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		 				<span class="sr-only">Toggle navigation</span>
		 				<span class="icon-bar"></span>
		 				<span class="icon-bar"></span>
		 				<span class="icon-bar"></span>
		 			</button>					
					<a class="navbar-brand hvr-bounce-in" href="../index.php"><span class="fa fa-home"></span> Trang Chủ</a>
				</div>

				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<?php 
						if(!isset($_SESSION['username']))
						{
					 ?>
					 <ul class="nav navbar-nav navbar-right">
						    <ul class="nav navbar-nav navbar-right">
						      <li><a href="../dangky_dangnhap.php"><span class="glyphicon glyphicon-user"></span> Tài Khoản</a></li>
						      <li><a href="../cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Giỏ Hàng <span class="badge"> 5</span></a></li>
							</ul>
					</ul>
					<?php 
						}
						else
						{
							$username = $_SESSION['username'];
							$sql ="Select name,avatar From user Where username=?";
							$stmt=$con->prepare($sql);
							$stmt->bind_param("s",$username);
							$stmt->execute();
							$result = $stmt->get_result();
							while ($row = mysqli_fetch_assoc($result)) {
							
					?>
					<ul class="nav navbar-nav navbar-right">
						    <ul class="nav navbar-nav navbar-right">
						      <li><a href="../profile.php"  class="hvr-underline-from-center benphai" style="text-transform: uppercase;"> <img src="../upload/<?php echo $row['avatar'] ?>" style="width: 40px;height: 40px;border-radius: 50px; " />  <?php echo $row['name']; ?> </a></li>
						      <li><a href="../includes/deletesesion.php" class="hvr-underline-from-center"><span class="fa fa-sign-out" ></span> Thoát</a></li>
						      <li><a href="../cart.php" class="hvr-underline-from-center"><span class="fa fa-shopping-cart"></span> Giỏ Hàng</a></li>
						    </ul>
					</ul>

					<?php	
						}
						} 
					?>
					
					
					<ul class="nav navbar-nav navbar-left ">
						    <ul class="nav navbar-nav navbar-left">
						      <li class="dropdown">
						      		<a href="baihoc.php?maKHoc=All&page=1" class="dropdown-toggle hvr-underline-from-center"   ><span class="fa fa-graduation-cap"></span>Khoá Học<span class="caret"></span></a>
								<ul class="dropdown-menu">
                                     <?php
                                        $sql = "Select maKHoc,imgKHoc,tenKhoa From khoahoc";
                                        $result = mysqli_query($con, $sql);
                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                      ?>
                                  <li><a href="baihoc.php?maKHoc=<?php echo $row['maKHoc'] ?>&page=1"><span class="<?php echo $row['imgKHoc'] ?>"></span> &nbsp; <?php echo $row['tenKhoa'] ?></a></li>
                                       <?php
                                          }
                                         ?>
							    </ul>
						      </li>
						      <li><a href="../gioithieu.php" class="hvr-underline-from-center"><span class="fa fa-angellist"></span> Giới Thiệu</a></li>
						    </ul>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
</div><!-- ketthucmenu -->
