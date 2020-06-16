<?php
		include('../config.php');
		session_start();
		$hoten=htmlspecialchars(trim($_GET['txtHoten']));
		$sdt=htmlspecialchars(trim($_GET['txtSdt']));
		$arrData=array();
		if($hoten==""){
			$arrTmp=array("hoten"=>"Họ Tên Không Được Rỗng Nhé!!");
			array_push($arrData,$arrTmp);
		}
		else if($sdt==""){
			$arrTmp=array("sdt"=>"Sdt Không Được Rỗng Nhé!!");
			array_push($arrData,$arrTmp);
		}
		else{
			$dulieu=json_encode($_SESSION['cart'],JSON_UNESCAPED_UNICODE);
			$query="INSERT INTO `donhang`(`hoten`, `sdt`, `dulieu`) VALUES (?,?,?)";
			$stmt=$con->prepare($query);
			$stmt->bind_param("sis",$hoten,$sdt,$dulieu);
			$stmt->execute();
			$res=$stmt->get_result();
			$arrTmp=array("thanhcong"=>"Gửi Thành Công");
			array_push($arrData,$arrTmp);
		}
		$arrData=json_encode($arrData,JSON_UNESCAPED_UNICODE);
		echo $arrData;
		
 ?>
