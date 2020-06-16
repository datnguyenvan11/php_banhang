<?php 
    function userOnline()
    {
        include('../config.php');
        $ip = $_SERVER['REMOTE_ADDR'];
        $url = $_SERVER['PHP_SELF'];
        $get=$_SERVER['QUERY_STRING'];
        $time = time();
        $query = "Select `id` From `online` Where `ip`=? ";
        $stmt=$con->prepare($query);
        $stmt->bind_param("s",$ip);
        $stmt->execute();
        $result = $stmt->get_result();
        $numRow = mysqli_num_rows($result);
        if($numRow>0){
            $query = "UPDATE `online` SET `url`=?,`requestGet`=?,`time`=? WHERE `ip`=?";
            $stmt=$con->prepare($query);
            $stmt->bind_param("ssis",$url,$get,$time,$ip);
            $stmt->execute();
        }
        else{
          $query = "INSERT INTO `online`(`ip`, `url`,`requestGet`, `time`) VALUES (?,?,?,?)";
          $stmt=$con->prepare($query);
          $stmt->bind_param("sssi",$ip,$url,$get,$time);
          $stmt->execute();
        }
        $query ="Delete From `online` Where `time`+5*60 < ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("i",$time);
        $stmt->execute();

    }
    function getInfoUser($username)
    {
      $con = mysqli_connect("localhost", "root", "", "detai");
      mysqli_set_charset($con, 'UTF8');
      $query = "Select id,username,avatar from user Where username=?";
      $stmt=$con->prepare($query);
      $stmt->bind_param("s",$username);
      $stmt->execute();
      $result=$stmt->get_result();
      $info=$result->fetch_assoc();
      return $info;
    }

 ?>