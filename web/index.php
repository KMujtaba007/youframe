<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<script src="	https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="styleindex.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		<title>YouFrame</title>
	</head>
	<body>
		<header class="head">

			<div class="upload">
					<h1>YouFrame</h1>
					<?php
					if(isset($_SESSION['user'])){
					echo '<form action="upload/imageupload.php" method="post" enctype="multipart/form-data">
					<nav1>
						<ul>
							<li><input  type="file" name="file"></li>
							<li><input type="text" name="filename"></li>
							<li><button class="btn btn-success" type="submit" name="submit">Upload</button></li>
						</ul>
					</nav1>
					</form>';
				}else{

				}
					?>
			</div>
		</header>

		<nav>
			<ul><?php if(isset($_SESSION['user'])){
			echo '	<li><a href="upload/logout.php">Logout</a></li>';
			}else{
				echo '<li><a href="upload/signin.php">Sign in</a></li>';
			}
			 ?>
			</ul>
		</nav>
		<main>

					<div class="gallery-container">
						<?php
							include_once 'upload/dbc.php';

							$sql = "SELECT * FROM gallery ORDER BY id DESC;";
							$stmt = mysqli_stmt_init($conn);
							if(!mysqli_stmt_prepare($stmt, $sql)){
								echo "Error";
							}else{
								mysqli_stmt_execute($stmt);
								$result = mysqli_stmt_get_result($stmt);
								while ($row = mysqli_fetch_assoc($result)) {
									echo'<a class="image-preview" href="images/'.$row['imgFullNameGallery'].'">
										<div style="background-image: url(images/'.$row['imgFullNameGallery'].')"></div>
										<h2>'.$row['imgtitle'].'</h2>
									</a>';
								}
							}

						?>
					</div>


		</main>
		<footer class="foot">
			<p>Developed by Khan Mujtaba Ahmed</p>
		</footer>
	</body>
</html>
