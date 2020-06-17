<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../styleindex.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		<title>My Uploads</title>
	</head>
	<body>
		<header class="head">
			<a href="logout.php">Logout</a>
			<div class="upload">
					<h1>My Uploads</h1>
				<form action="imageupload.php" method="post" enctype="multipart/form-data">
						<input type="file" name="file">
						<input type="text" name="filename">
						<button type="submit" name="submit">Upload</button>
				</form>
			</div>
		</header>
		<main>
			<section class="gallery">
					<div class="gallery-container">
						<?php
							include_once 'upload/dbc.php';

							$sql = "SELECT * FROM $name". 'ORDER BY id DESC';
							$stmt = mysqli_stmt_init($conn);
							if(!mysqli_stmt_prepare($stmt, $sql)){
								echo "Error";
							}else{
								mysqli_stmt_execute($stmt);
								$result = mysqli_stmt_get_result($stmt);
								while ($row = mysqli_fetch_assoc($result)) {
									echo'<a href="images/'.$row['imgFullNameGallery'].'">
										<div style="background-image: url(userimages/'.$row['imgFullNameGallery'].')"></div>
										<h2>'.$row['imgtitle'].'</h2>
									</a>';
								}
							}

						?>
					</div>
			</section>
		</main>
		<footer class="foot">
			<p>Developed by Khan Mujtaba Ahmed.</p>
		</footer>
	</body>
</html>
