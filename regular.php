<?php
			function checkEmail($email){
				$flag = false;
				if(filter_var($email,FILTER_VALIDATE_EMAIL)){
					$flag = true;
				}
				return $flag;
			}
			function checkUsername($name){
				$flag = false;
				$pattern = '#^[a-z_][a-z0-9_\.\s]{4,31}$#';
				if(preg_match($pattern, $name)==true){
					$flag = true;
				}
				return $flag;
			}

			function checkEmptyInput($text){
				$flag = false;
				if(!trim($text)==''){
					$flag = true;
				}
				return $flag;
			}
			



 ?>
