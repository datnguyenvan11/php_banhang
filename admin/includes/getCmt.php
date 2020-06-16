<?php
    include('../../config.php');
    $query = "Select binhluan.user , binhluan.cmt , binhluan.date  From `binhluan`,`baihoc` Where kiemduyet=0 and binhluan.idbaihoc = baihoc.id";
    $result = $con->query($query);
    $arrData=array();
    include('../../lib.php');
    $arrData = array();
    while($row= mysqli_fetch_assoc($result))
    {
      $user=$row['user'];
      $userInfo = getInfoUser($user);
      $cmt = $row['cmt'];
      $date= $row['date'];
      $arrTmp=array("userInfo"=>$userInfo,"cmt"=>$cmt,"date"=>$date);
      array_push($arrData,$arrTmp);
    }
    $xhtml="";

    for ($i=0 ; $i < count($arrData) ; $i++) {
      $username=$arrData[$i]['userInfo']['username'];
      $avatar=$arrData[$i]['userInfo']['avatar'];
      $cmt=$arrData[$i]['cmt'];
      $date=$arrData[$i]['date'];
      $xhtml .= '<div class="row">
                  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                  <img src="../upload/'. $avatar .'" style="width:50px;height:50px;border-radius:50px;"><p>'.$username.'</p></img>
                  </div>
                  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="margin-top:10px;">'.$cmt.'</div>
                  
              </div>';
    }
    $countCmt = count($arrData);
    $arrJson = array("xhtml"=>$xhtml,"countCmt"=>$countCmt);

    $arrJson = json_encode($arrJson,JSON_UNESCAPED_UNICODE);
    echo $arrJson;
 ?>
