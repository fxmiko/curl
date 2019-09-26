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
		<h1>Ceker</h1>
		<form action="check.php" method="post">
			<div class="textarea">
				<textarea name="cc-list" id="cc-list">NUMBER|MONTH|YEAR|CVV</textarea>
			</div>
			<div class="button">
				<input type="submit" id="cc-check" value="Start check">

			</div>
		</form>
	</div>
</body>
</html>