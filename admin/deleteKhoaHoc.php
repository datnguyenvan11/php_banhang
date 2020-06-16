<script type="text/javascript" src="../js/layout.js"></script>
<?php
        if(!isset($_GET['id']))
        {
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
				echo '<script type="text/javascript">               
				       setTimeout("Redirect1()", 1000);
				   	   </script>';  
			}				 
			else
			{
				session_start();
				include('../config.php');
				$id = $_GET['id'];
				$query = "Delete From khoahoc Where id=?";
				$stmt=$con->prepare($query);
				$stmt->bind_param('i',$id);
				$stmt->execute();
				header("location:khoahoclist.php");
			}			
		}	
        }
        }
 ?>