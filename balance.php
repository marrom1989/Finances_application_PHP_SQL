<?php
	
	session_start();
	
		if(!isset($_SESSION['online'])) {
		
		header('Location: index.php');
		exit();
	}
	
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset = "utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>House budget</title>
	<meta name = "discription" content = "Take care of your home budget. This application helps you to hold your hand on your moneys!!" />
	<meta name = "keywords" content = "budget, money, deposit, whithdraw, house budget, " />
	<meta http-equiv = "X-UA-Compatible" content = "IE=edge,chrome=1" />
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel ="stylesheet" href = "cssFontello/fontello.css" type = "text/css" />
	<link rel ="stylesheet" href = "css/balance_style.css" type = "text/css" />
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=latin-ext" rel="stylesheet">
	
	<script>
			window.onload = function() {
			 
			 
			var chart = new CanvasJS.Chart("piechart", {
				animationEnabled: true,
				title: {
					text: "Chart of Expenses"
				},
				subtitles: [{
					text: "November 2017"
				}],
				data: [{
					type: "pie",
					yValueFormatString: "#,##0.00\"%\"",
					indexLabel: "{label} ({y})",
					dataPoints: <?php echo json_encode($_SESSION['dataPoints'], JSON_NUMERIC_CHECK); ?>
				}]
			});
			chart.render();
			 
			}
</script>
	
</head>

<body>

		<header>
		<div class="container-fluid border-bottom" id="header">
			<div class="row justify-content-around">
					<div class="col" id="logo">
						<a href ="index.php" id="logoLink">House<i class = "icon-money"></i><span style="color: #CC0000">Budget </span></a>
					</div>
					<div class="col" id="clock"><?php date_default_timezone_set('Europe/Warsaw'); echo $clock = date('Y/m/d H:i:s'); ?></div>
			</div>		
		</div>
	</header>
	<nav class="navbar navbar-expand-xl navbar-light bg-light" id="navSpec">
		<a class="navbar-brand" href="#">Menu:</a>
			<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
				<span class="navbar-toggler-icon"></span>
			</button>	
			<div class="collapse navbar-collapse" id="navbarMenu">
				<ul class="navbar-nav">
					<li class="nav-item" id="income">
						<a href="add_incomes.php" class="nav-link">Add Income</a>
					</li>
					<li class="nav-item" id="expense">
						<a href="add_expense.php" class="nav-link">Add Expense</a>
					</li>
					<li class="nav-item" id="balance">
						<a href="balance.php" class="nav-link">Balance</a>
					</li>
					<li class="nav-item" id="settings">
						<a href="#" class="nav-link">Settings</a>
					</li>
					<li class="nav-item">
						<a href="php_logout.php" class="nav-link">Log Out</a>
					</li>	
				</ul>
			</div>
	</nav>
		<main>
				<article>
					<form>
						<div class="container-fluid" id="mainContent">
									<div class="row justify-content-end" id="dropdown">
										<div class="dropdown">
											<button class="btn btn-danger dropdown-toggle" type="submit" id="dropdownButton" data-toggle="dropdown">Select range</button>
											<div class="dropdown-menu">
												<a class="dropdown-item" id="currentMonth" href="php_current_month.php">Current Month</a>
												<a class="dropdown-item" id="previousMonth" href="php_previous_month.php">Previous Month</a>
												<a class="dropdown-item" id="currentYear" href="php_current_year.php">Current Year</a>
												<a class="dropdown-item" id="custom" href="select_period_of_time.php">Custom</a>
											</div>	
										</div>
									</div>
								<div class="row justify-content-center">
									<div class="col-12 align-self-center">
										<table id ="incomeTable">
											<tr><th colspan = "2">Incomes</th></tr>
											<tr><th>Category</th><th>Value of income</th></tr>
											<tr><td>Payment</td><td name="payment">
											<?php  if(isset($_SESSION['payment'])){ echo $_SESSION['payment'];} ?></td></tr>
											
											<tr><td>Bank Interest</td><td name="bank_interest">
											<?php if(isset($_SESSION['bank_interest'])){  echo $_SESSION['bank_interest'];} ?></td></tr>
											
											<tr><td>Sales on allegro</td name="sales_on_allegro"><td>
											<?php if(isset($_SESSION['sales_on_allegro'])){ echo $_SESSION['sales_on_allegro']; }?></td></tr>
											
											</tr><td>Others</td><td name="incomes_others">
											<?php if(isset($_SESSION['incomes_others'])){ echo $_SESSION['incomes_others']; }?></td></tr>
											
											<tr class="bg-success"><th>Sum:</th><td name="incomes_sum">
											<?php if(isset($_SESSION['incomes_sum'])){ echo $_SESSION['incomes_sum']; }?></td></tr>
										</table>
									</div>	
								</div>
								<div class="row justify-content-center">
									<div class="col-12 align-self-center">
										<table id ="expenseTable">
											<tr><th colspan = "2">Expenses</th></tr>
											<tr><th>Category</th><th>Value of expense</th></tr>
											<tr><td>Food</td><td name="food">
											<?php if(isset($_SESSION['food'])){ echo $_SESSION['food']; }?></td></tr>
											
											<tr><td>House</td><td name="house">
											<?php if(isset($_SESSION['house'])){ echo $_SESSION['house']; }?></td></tr>
											
											<tr><td>Transport</td><td name="transport">
											<?php if(isset($_SESSION['transport'])){ echo $_SESSION['house']; }?></td></tr>
											
											</tr><td>Telecomunication</td><td name="telecomunication">
											<?php if(isset($_SESSION['telecomunication'])){ echo $_SESSION['telecomunication']; }?></td></tr>
											
											</tr><td>Healthcare</td><td name="healthcare">
											<?php if(isset($_SESSION['healthcare'])){ echo $_SESSION['healthcare']; }?></td></tr>
											
											</tr><td>Cloth</td><td name="cloth">
											<?php if(isset($_SESSION['cloth'])){ echo $_SESSION['cloth']; }?></td></tr>
											
											</tr><td>Hygiene</td><td name="hygiene">
											<?php if(isset($_SESSION['hygiene'])){ echo $_SESSION['hygiene']; }?></td></tr>
											
											</tr><td>Kids</td><td name="kids">
											<?php if(isset($_SESSION['kids'])){ echo $_SESSION['kids']; }?></td></tr>
											
											</tr><td>Entertainment</td><td name="entertainment">
											<?php if(isset($_SESSION['entertainment'])){ echo $_SESSION['entertainment']; }?></td></tr>
											
											</tr><td>Trips</td><td name="trips">
											<?php if(isset($_SESSION['trips'])){ echo $_SESSION['trips']; }?></td></tr>
											
											</tr><td>Trainings</td><td name="trainings">
											<?php if(isset($_SESSION['trainings'])){ echo $_SESSION['trainings']; }?></td></tr>
											
											</tr><td>Books</td><td name="books">
											<?php if(isset($_SESSION['books'])){ echo $_SESSION['books']; }?></td></tr>
											
											</tr><td>Savings</td><td name="savings">
											<?php if(isset($_SESSION['savings'])){ echo $_SESSION['savings']; }?></td></tr>
											
											</tr><td>Pension</td><td name="pension">
											<?php if(isset($_SESSION['pension'])){ echo $_SESSION['pension']; }?></td></tr>
											
											</tr><td>Repaymen</td><td name="repaymen">
											<?php if(isset($_SESSION['repaymen'])){ echo $_SESSION['repayment']; }?></td></tr>
											
											</tr><td>Donation</td><td name="donation">
											<?php if(isset($_SESSION['donation'])){ echo $_SESSION['donation']; }?></td></tr>
											
											</tr><td>Others</td><td name="expenses_others">
											<?php if(isset($_SESSION['expenses_others'])){ echo $_SESSION['expenses_others']; }?></td></tr>
											
											<tr class="bg-danger"><th>Sum:</th><td name="expense_sum">
											<?php if(isset($_SESSION['expenses_sum'])){ echo $_SESSION['expenses_sum']; }?></td></tr>
										</table>
									</div>	
							</div>
							<div class="row justify-content-center">
								<div id="piechart" style="height: 370px; width: 100%;"></div>
								<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
							</div>
						</div>	
					</form>	
				</article>
		</main>
			<footer>
				<div class="container-fluid">
					<div class="row">
						<div class="col-12" id="footer">
							HouseBudget.com &copy; 2018
						</div>
					</div>	
				</div>	
			</footer>
			
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type ="text/javascript" src = "js/jquery-3.3.1.min.js"></script>
<script type ="text/javascript" src = "js/clock.js"></script>
<script type ="text/javascript" src = "js/hideAndShowElements.js"></script>

</body>

</html>