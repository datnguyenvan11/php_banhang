<?php
  include('../../config.php');
  //reset thong tin online
  $time = time();
  $query ="Delete From `online` Where `time`+5*60 < ?";
  $stmt = $con->prepare($query);
  $stmt->bind_param("i",$time);
  $stmt->execute();
  //lay thong tin online
  $query = "Select * From `Online`";
  $result=$con->query($query);
  $arrData=array();
  while($row=$result->fetch_assoc())
  {
    $ip=$row['ip'];
    $url=$row['url'];
    $requestGet=$row['requestGet'];
    $time=date("h:i:sa Y-m-d ",$row['time']);
    $arr = array("ip"=>$ip,
                  "url"=>$url,
                  "requestGet"=>$requestGet,
                  "time"=>$time
                );
    array_push($arrData, $arr);
  }
  $xhtml="";
  foreach ($arrData as $key => $value) {
    $xhtml.='<tr>';
    $xhtml.='<td>'.$value['ip'].'</td>';
    $xhtml.='<td>'.$value['url'].'?'.$value['requestGet'].'</td>';
    $xhtml.='<td>'.$value['time'].'</td>';
    $xhtml.='</tr>';
  }

  echo $xhtml ;





 ?>
