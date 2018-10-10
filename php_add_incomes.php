<?php

	session_start();
	
	$amount = $date = $choice = $comment = "";
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		if(isset($_POST['amount'])){
		try{
			
					require_once "connect.php";
					
					$connect = new mysqli($host, $db_user,$db_password,$db_name);
					if($connect->connect_errno!=0) {
						
						throw new Exception(mysqli_connect_errno());
					} else {
						
						$amount = $_POST['amount'];
						$amount = test_input($_POST['amount']);
						
						$date = $_POST['date'];
						$date = test_input($_POST['date']);
						
						$choice = $_POST['choice'];
						$choice = test_input($_POST['choice']);
						
						$comment = $_POST['comment'];
						$comment = test_input($_POST['comment']);
						
						$id = $_SESSION['user_id']; 
						$id = test_input($_SESSION['user_id']);
						
						echo $choice;
					
					
						if($connect->query("INSERT INTO incomes(user_id, income_category_assigned_to_user_id, amount, date_of_income, income_comment) VALUES ((SELECT user_id FROM users WHERE user_id = '$id'), (SELECT id FROM incomes_category_assigned_to_user WHERE name = '$choice' AND user_id = '$id'), '$amount', '$date', '$comment')")) {
							
							$_SESSION['online'] = true;
							header('Location: main_menu.php');
							exit();
						}else {
						
						throw new Exception($connect->error);
					}
						
					}
				}catch (Exception $error) {
					
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