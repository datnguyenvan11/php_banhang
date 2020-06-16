<?php 
	function getBai($id){
		include('../config.php');
		$query = "Select  id,tenBai,giatien,imgBai From baihoc Where id=? ";
		$stmt=$con->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		return $row = mysqli_fetch_assoc($result);
	}

	function checkCart($id){
		$flag=true;
		for ($i=0; $i <count($_SESSION['cart']) ; $i++) { 
				if($_SESSION['cart'][$i]['id']==$id)
					$flag = false;
		}
		return $flag;
	}
	session_start();
	$id=$_REQUEST['id'];
	$res=getBai($id);
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart']=array();
		array_push($_SESSION['cart'],$res);
		echo "Thêm Thành Công!";
	}
	else{
		if(checkCart($id)==true)
		{
			array_push($_SESSION['cart'],$res);
			echo "Thêm Thành Công!";
		}
		else{
			echo "Đã tồn tại trong giỏ";
		}
	}

 ?>