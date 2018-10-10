<?php
	
	session_start();
	
	$email = $password = "";
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	
		try{
			
				require_once "connect.php";
				
				$connect = new mysqli($host, $db_user,$db_password,$db_name);
				if($connect->connect_errno!=0) {
					
					throw new Exception(mysqli_connect_errno());
				} else {
						
					$email = $_POST['email'];
					$email = test_input($_POST["email"]);
					
					$password = $_POST['password'];
					$password = test_input($_POST["password"]);
					
					$email = htmlentities($email, ENT_QUOTES, "UTF-8");	
					$password = htmlentities($password, ENT_QUOTES, "UTF-8");	
					
					if($result = $connect->query(
					sprintf("SELECT * FROM users WHERE email='%s'", 
						mysqli_real_escape_string($connect, $email)))) {
							
							$number_of_users = $result->num_rows;
							if($number_of_users > 0) {
								$row = $result->fetch_assoc();
								if(password_verify($password, $row['password'])){
								
									$_SESSION['online'] = true;
									$_SESSION['user_id'] = $row['user_id'];
									$_SESSION['name'] = $row['name'];
									
									unset($_SESSION['error_logIn']);
									$result->free_result();
									header('Location:main_menu.php');
								} else {
								
								$_SESSION['error_logIn'] = 'The email or password is incorrect. Please enter correct data.';
								header('Location: login.php');
								exit();
								}
							} 
						}
						
					$connect->close();
				}
			} catch (Exception $error) {
				
				echo 'Serwer error. Please try in another time.';
				
				echo $error;
			}
			
	}	
	function test_input($data) {
		
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>
