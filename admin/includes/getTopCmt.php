<?php
include('../../config.php');
$query ="SELECT binhluan.idUsername,user.name,user.avatar,count(binhluan.id) as countCMT FROM `binhluan`,user Where binhluan.idUsername=user.id and binhluan.kiemduyet=1 GROUP BY binhluan.idUsername ORDER by countCMT DESC LIMIT 3";
$result = $con->query ($query);
$xhtml="";
while($row=mysqli_fetch_assoc($result))
{
  $xhtml.='<tr>';
  $xhtml.='<td><img style="width: 40px;height: 40px;" src="../upload/'. $row['avatar'].'"></td>';
  $xhtml.='<td>'.$row['name'].'</td>';
  $xhtml.='<td>'.$row['countCMT'].'</td>';
  $xhtml.= '</tr>';
}
echo $xhtml



 ?>
