<?php       
	function __checksesion($username)
	{    
		if(!isset($_SESSION['username']))
		{
			return false;
		}
		else
		{
			include('../config.php');
			$chucdanh="";
			$query = "Select chucdanh From user Where username='$username'";
			$result=$con->query($query);
			$row=mysqli_fetch_assoc($result);
			$chucdanh=$row['chucdanh'];
			if($chucdanh!=1)
				return false;
			return true;			
		}
	}
 ?>