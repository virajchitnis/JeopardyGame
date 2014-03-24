<html>
	<head>
		<?php
			function sanitizeString($string) {
				$string = preg_replace('/[^A-Za-z0-9\. -]/', '-', $string); // Removes special chars.
				return str_replace(' ', '_', $string); // Replaces all spaces with hyphens.
			}
		
			if ((isset($_POST['json'])) && (isset($_POST['filename']))) {
				$json = $_POST['json'];
				$file = $_POST['filename'];
				$location = "/tmp/";
				
				$file = sanitizeString($file);
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