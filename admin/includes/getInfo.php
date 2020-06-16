<?php
function thongke($table){
  include('../../config.php');
  $query = "Select count(id) as count From ".$table;
  $result = mysqli_query($con,$query);
  $row = mysqli_fetch_assoc($result);
  $countRes = $row['count'];
  return $countRes;
}

  $countCourse = thongke('khoahoc');
  $countBaihoc = thongke('baihoc');
  $countUser = thongke('user');
  $countOnline = thongke('online');

  $arrData = array( "coutCourse"=>$countCourse,
                    "countBaihoc"=>$countBaihoc,
                    "countUser"=>$countUser,
                    "countOnline"=>$countOnline,
                    );
  $arrData = json_encode($arrData);
  echo $arrData;

 ?>
