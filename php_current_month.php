<?php

	session_start();
	
	require_once "connect.php";
					
					$connect = new mysqli($host, $db_user,$db_password,$db_name);
					if($connect->connect_errno!=0) {
						
						throw new Exception(mysqli_connect_errno());
					} else {
						
						$month = date('m');
						$year = date('Y');
					
	
						$id = $_SESSION['user_id'];
						$payment = "payment";
						$bank_interest = "bank_interest";
						$sales_on_allegro = "sales_on_allegro";
						$incomes_others = "incomes_others";
						
					//incomes
					
					$_SESSION['payment']	= incomes($connect, $id, $payment, $month, $year);
					$_SESSION['bank_interest']	= incomes($connect, $id, $bank_interest, $month, $year);
					$_SESSION['sales_on_allegro']	= incomes($connect, $id, $sales_on_allegro, $month, $year);
					$_SESSION['incomes_others']	= incomes($connect, $id, $incomes_others, $month, $year);
					
					$_SESSION['incomes_sum'] = $_SESSION['payment'] + $_SESSION['bank_interest'] + $_SESSION['sales_on_allegro'] + $_SESSION['incomes_others'];
	
					//expenses
					
					$food = "food";
					$house = "house";
					$transport = "transport";
					$telecomunication = "telecomunication";
					$healthcare = "healthcare";
					$cloth = "cloth";
					$hygiene = "hygiene";
					$kids = "kids";
					$entertainment = "entertainment";
					$trip = "trips";
					$trainings = "trainings";
					$books = "books";
					$savings = "savings";
					$pension = "pension";
					$repaymen = "repaymen";
					$donation = "donation";
					
					$_SESSION['food']	= expenses($connect, $id, $food, $month, $year);
					$_SESSION['house']	= expenses($connect, $id, $house, $month, $year);
					$_SESSION['transport']	= expenses($connect, $id, $transport, $month, $year);
					$_SESSION['telecomunication']	= expenses($connect, $id, $telecomunication, $month, $year);
					$_SESSION['healthcare']	= expenses($connect, $id, $healthcare, $month, $year);
					$_SESSION['cloth']	= expenses($connect, $id, $cloth, $month, $year);
					$_SESSION['hygiene']	= expenses($connect, $id, $hygiene, $month, $year);
					$_SESSION['kids']	= expenses($connect, $id, $kids, $month, $year);
					$_SESSION['entertainment']	= expenses($connect, $id, $entertainment, $month, $year);
					$_SESSION['trips']	= expenses($connect, $id, $trip, $month, $year);
					$_SESSION['trainings']	= expenses($connect, $id, $trainings, $month, $year);
					$_SESSION['books']	= expenses($connect, $id, $books, $month, $year);
					$_SESSION['savings']	= expenses($connect, $id, $savings, $month, $year);
					$_SESSION['pension']	= expenses($connect, $id, $pension, $month, $year);
					$_SESSION['repaymen']	= expenses($connect, $id, $repaymen, $month, $year);
					$_SESSION['donation']	= expenses($connect, $id, $donation, $month, $year);
					
					$_SESSION['expenses_sum'] = $_SESSION['food'] + $_SESSION['house'] + $_SESSION['transport'] + $_SESSION['telecomunication'] + $_SESSION['healthcare'] + $_SESSION['cloth'] + $_SESSION['hygiene'] + $_SESSION['kids'] + $_SESSION['entertainment'] + $_SESSION['trips'] + $_SESSION['trainings'] + $_SESSION['books'] + $_SESSION['savings'] + $_SESSION['pension'] + $_SESSION['repaymen'] + $_SESSION['donation'];
					
					//pie chart
					
					$_SESSION['dataPoints'] = array( 
							array("label"=>"Food", "y"=>$_SESSION['food'] / 100 * 3.6),
							array("label"=>"House", "y"=>$_SESSION['house'] / 100 * 3.6),
							array("label"=>"Transport", "y"=>$_SESSION['transport'] / 100 * 3.6),
							array("label"=>"Telecomunication", "y"=>$_SESSION['telecomunication'] / 100 * 3.6),
							array("label"=>"Healthcare", "y"=>$_SESSION['healthcare'] / 100 * 3.6),
							array("label"=>"Cloth", "y"=>$_SESSION['cloth'] / 100 * 3.6),
							array("label"=>"Hygiene", "y"=>$_SESSION['hygiene'] / 100 * 3.6),
							array("label"=>"Kids", "y"=>$_SESSION['kids'] / 100 * 3.6),
							array("label"=>"Entertainment", "y"=>$_SESSION['entertainment'] / 100 * 3.6),
							array("label"=>"Trips", "y"=>$_SESSION['trips'] / 100 * 3.6),
							array("label"=>"Trainings", "y"=>$_SESSION['trainings'] / 100 * 3.6),
							array("label"=>"Books", "y"=>$_SESSION['books'] / 100 * 3.6),
							array("label"=>"Savings", "y"=>$_SESSION['savings'] / 100 * 3.6),
							array("label"=>"Pension", "y"=>$_SESSION['pension'] / 100 * 3.6),
							array("label"=>"Repaymen", "y"=>$_SESSION['repaymen'] / 100 * 3.6),
							array("label"=>"Donation", "y"=>$_SESSION['donation'] / 100 * 3.6)
					);
					
					
	
	header('Location: balance.php');

					}	

function incomes ($connect, $id , $value, $month, $year) {
	
	$result = $connect->query("SELECT SUM(amount) FROM incomes AS inc INNER JOIN incomes_category_assigned_to_user AS ic ON inc.income_category_assigned_to_user_id = ic.id AND ic.name = '$value' AND inc.user_id = ic.user_id AND MONTH(date_of_income) = '$month' AND YEAR(date_of_income) = '$year'");
			
		
	
	$row = $result->fetch_assoc();
	
	$_SESSION["'$value'"] = $row['SUM(amount)'];
	return $_SESSION["'$value'"]; 
	
}
function expenses ($connect, $id , $value,$month, $year) {
	
	$result = $connect->query("SELECT SUM(amount) FROM expenses AS exp INNER JOIN expenses_category_assigned_to_user AS ec ON exp.expenses_category_assigned_to_user_id = ec.id AND ec.name = '$value' AND exp.user_id = ec.user_id AND MONTH(date_of_expense) = '$month' AND YEAR(date_of_expense) = '$year'");
			

	$row = $result->fetch_assoc();
	$_SESSION["'$value'"] = $row['SUM(amount)'];
	return $_SESSION["'$value'"]; 
	
}

?>