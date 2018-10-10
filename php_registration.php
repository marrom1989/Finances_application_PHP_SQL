<?php
	
	session_start();
	
	$name = $email = $safe_email = $password = $confirm_password = "";
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {

	
	if(isset($_POST['name'])){
		
		$all_tests = true;
		
		// name
		
		$name = $_POST['name'];
		$name = test_input($_POST["name"]);
		
		if((strlen($name) < 4) || (strlen($name) > 20)) {
			
			$all_tests = false;
			$_SESSION['error_name'] = 'The name has to have from 4 to 20 characters. Please enter correct name.';
			header('Location: registration.php');
			exit();
		}
		
		if(ctype_alnum($name) == false) {
			
			$all_tests = false;
			$_SESSION['error_name'] = "The name can't has any special characters !! Only letters and numbers !! Please enter correct name.";
			header('Location: registration.php');
			exit();

		}
		
	if(preg_match('/[A-Z|0-9]/', $_POST['name']) == false){
		
			$all_tests = false;
			$_SESSION['error_name'] = "The name has to have at least one big letter and one number.  Please enter correct name.";
			header('Location: registration.php');
			exit();
		
	}
		
		//email
		
		$email = $_POST['email'];
		$email = test_input($_POST["email"]);
		$safe_email = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if((filter_var($safe_email, FILTER_VALIDATE_EMAIL) == false) || ($safe_email != $email)){
			
			$all_tests = false;
			$_SESSION['error_email'] = 'Please enter corect email address.';
			header('Location: registration.php');
			exit();
		}
		
		//password
		
		$password = $_POST['password'];
		$password = test_input($_POST["password"]);	
		$confirm_password = $_POST['confirm_password'];
		$confirm_password = test_input($_POST["confirm_password"]);	
		
		if(strlen($password) < 8) {
			
			$all_tests = false;
			$_SESSION['error_password'] = 'The password is to short!! Please enter longer password.';
			header('Location: registration.php');
			exit();
		}
		
		if(strlen($password) > 25) {
			
			$all_tests = false;
			$_SESSION['error_password'] = 'The password is to long!! Please enter longer password.';
			header('Location: registration.php');
			exit();
		}
		
		if($password != $confirm_password) {
			
			$all_tests = false;
			$_SESSION['error_password'] = 'The passwords are not the same. Please enter correct passwords';
			header('Location: registration.php');
			exit();
		}
		
		$hash_password = password_hash($password, PASSWORD_DEFAULT);
		
		
		
		//reCaptcha
		
		$secret_key = '6LerTW8UAAAAAFDXXS6Cn6iM1yEDsJO2rGPV_RWj';
		
		$check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
		
		$response = json_decode($check);
		
		if($response->success == false) {
			
			$all_tests = false;
			$_SESSION['error_bot'] = "Please confirm that you are not bot.";
			header('Location: registration.php');
			exit();
		}
		
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try{
			
			$connect = new mysqli($host, $db_user,$db_password,$db_name);
			if($connect->connect_errno!=0) {
				
				throw new Exception(mysqli_connect_errno());
			} else {
				
				// does email exist
				
				$result = $connect->query("SELECT user_id FROM users WHERE email = '$email'");
				
				if(!$result) throw new Exception($connect->error);
				
				$number_of_emails = $result->num_rows;
				if($number_of_emails > 0) {
					
					$all_tests = false;
					$_SESSION['error_email'] = "The email already exist. Please enter different email.";
					header('Location: registration.php');
					exit();
				}
				
				// does name exist
				
				$result = $connect->query("SELECT user_id FROM users WHERE name = '$name'");
				
				if(!$result) throw new Exception($connect->error);
				
				$number_of_names = $result->num_rows;
				if($number_of_names > 0) {
					
					$all_tests = false;
					$_SESSION['error_name'] = "The name already exist. Please enter different name.";
					header('Location: registration.php');
					exit();
				}
				
				if($all_tests == true) {
					
					if($connect->query("INSERT INTO users VALUES (NULL, '$name', '$hash_password', '$email')")) {
						
						$connect->query("INSERT INTO incomes_category_assigned_to_user(user_id, name) SELECT (SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1), name FROM incomes_category_default");
						$connect->query("INSERT INTO expenses_category_assigned_to_user(user_id, name) SELECT (SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1), name FROM expenses_category_default");
						$connect->query("INSERT INTO payment_method_assigned_to_user(user_id, name) SELECT (SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1), name FROM payment_methods_default");

						if(isset($_SESSION['error_name'])) unset($_SESSION['error_name']);
						if(isset($_SESSION['error_email'])) unset($_SESSION['error_email']);
						if(isset($_SESSION['error_password'])) unset($_SESSION['error_password']);
						if(isset($_SESSION['error_haslo2'])) unset($_SESSION['e_haslo2']);
						if(isset($_SESSION['error_bot'])) unset($_SESSION['error_bot']);
						
						
						
						header('Location: login.php');
						exit();
					} else {
						
						throw new Exception($connect->error);
					}
					
				}
				
				
				$connect->close();
			}

		}
		catch(Exception $error) {
			
			echo 'Serwer error. Please try in another time.';
			
			echo $error;
		}
	}
	}
	
	function test_input($data) {
		
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

?>
