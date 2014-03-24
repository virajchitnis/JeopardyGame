<html>
	<head>
		<?php
			$file = "test.qbk";
			$open_file = "test_open.qbk";
			$deflated_file = "test_open";
			$location = "/tmp/";
			
			exec("cp ".$location.$file." ".$location.$open_file);
			exec("gunzip -S .qbk ".$location.$open_file);
			$json = file_get_contents($location.$deflated_file);
			exec("rm ".$location.$deflated_file);
		?>
		<link rel="stylesheet" href="css/design.css">
		<title><?php echo $open_file; ?> - Play Jeopardy!</title>
	</head>
	<body>
		<p id="hidden_json"><?php echo $json; ?></p>
	</body>
</html>