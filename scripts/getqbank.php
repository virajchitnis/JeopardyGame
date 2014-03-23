<html>
	<head>
		<?php
			if (isset($_POST['json'])) {
				$json = $_POST['json'];
				$file = "testbank";
				
				$location = "/tmp/";
				
				file_put_contents($location.$file, $json);
				exec("gzip -S .qbk ".$location.$file);
			}
			else {
				header('Location: ../');
			}
		?>
		<link rel="stylesheet" href="../css/design.css">
		<title>Download your Question Bank</title>
	</head>
	<body>
		<div class="wrapper">
			<?php include('../common/header.php'); ?>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<div id="download_body">
				<h3>Download your question bank:</h3>
				<p>&nbsp;</p>
				<button>Download</button>
			</div>
			<div class="push"></div>
		</div>
		<?php include('../common/footer.php'); ?>
	</body>
</html>