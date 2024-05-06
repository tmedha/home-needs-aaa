<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hello AWS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
	<link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container text-center bg-dark text-light">
		<img width="75vw" src="logo.svg">
		<h1>
			<?php
				$a = 1;
				$b = 2;
				$c = $a + $b;
				echo 'Hello AWS!';
				echo '<br>';
				echo "$a + $b = $c";
			?>
		</h1>
	</div>
</body>
</html>