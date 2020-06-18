<script type="text/javascript" src="../js/layout.js"></script>
<?php
        if(!isset($_GET['id']) && !isset($_GET['maKHoc']))
        {
            echo "Cút";
            echo '<script type="text/javascript">               
                     setTimeout("Redirect1()", 1000);
                    </script>';              
        }
        else
        {
?>
<?php 
	session_start();
	if(!isset($_SESSION['username']))
	{
            echo "Cút";
            echo '<script type="text/javascript">               
                     setTimeout("Redirect1()", 1000);
                    </script>';  			
	}
        else
        {
                include('./checkAdmin.php');
                if(isset($_GET['id']))
		{
            $username=$_SESSION['username'];
			if(__checksesion($username)==false)
			{
				echo "Cút!";
				echo '<script type="text/javascript">               
				       setTimeout("Redirect1()", 1000);
				   	   </script>';  
			}				 
			else
			{
				session_start();
				include('../config.php');
				$id = $_GET['id'];
				$maKHoc = $_GET['maKHoc'];
				$query = "Delete From baihoc Where id=?";
				$stmt=$con->prepare($query);
				$stmt->bind_param('i',$id);
				$stmt->execute();
				header("location:baihoc.php?maKHoc=$maKHoc");
			}			
		}	
    }
 }
 ?>