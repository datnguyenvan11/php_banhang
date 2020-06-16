<?php
  $log= "";
  if(isset($_POST['txtCamnhan'])){
    if(empty($_POST['txtCamnhan']))
      $log = "Cảm Nhận Không Được Rỗng Nha !";
    else {
      //include function database
      include('../config.php');
      include('../lib.php');
      //get thong tin insert
      session_start();
      $username=$_SESSION['username'];
      $user=getInfoUser($username);
      $idUser=$user['id'];
      $txtCamnhan=htmlspecialchars(trim($_POST['txtCamnhan']));
      $hide=0;
      //insert database
      $query="INSERT INTO `camnhan`(`idUser`, `txtCamnhan`, `hide`) VALUES (?,?,?)";
      $stmt=$con->prepare($query);
      $stmt->bind_param("isi",$idUser,$txtCamnhan,$hide);
      $stmt->execute();
      //finish
      $log = "Gửi Cảm Nhận Thành Công Chờ Duyệt";
      mysqli_close($con);
    }
  }
  echo $log;

 ?>
