<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
	<link rel="stylesheet" href="css/responsive.css" />
	<link rel="stylesheet" href="css/index.css" />
	<link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css" />
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
	<link rel='shortcut icon' href='./icon/music.ico' /> 
	<title>Liked song</title>
</head>
<body>
	<nav class="navbar">
		<div class="container">
			<h1 class="nav-left"><i class="mx-2 bi bi-boombox"></i><a class="text-decoration-none text-dark" href="index.php">Music Page</a></h1>
			<div class="search">
				<i class="bi bi-search"></i>
				<input type="text" name="search-song" id="search-song" placeholder="Tìm kiếm" />
			</div>
			<div class="nav-right">

				<?php
				if (isset($_SESSION['userName'])) {
					$userName = $_SESSION['userName'];
					echo "
					<div class='user-avatar'>
					<img src='./img/music.jpg' alt='' class='img-user' />
					<p class='user-name'>$userName</p>
						</div>
					<div class='nav-logout d-inline'>
					<a href='./api/logOut.php' class='logout-btn text-decoration-none text-black p-1'>Log Out
						<i class='bi bi-box-arrow-right'></i>
					</a>
					</div>
					";
				} else {
					echo '
					<div class="nav-login d-inline">
					<a href="login.html" class="mx-2 login-btn text-decoration-none text-black p-1">
					Log In
						<i class="bi bi-box-arrow-in-right"></i>
					</a>
					</div>
					';
				}
				?>



			</div>
		</div>
	</nav>

<div class="col-lg-8 cur-song-list mx-auto">
	<div class="body-cur w-100">
		<div class="row">
			<div class="col-lg-3 text-center">
				<!-- <input type="search" /> -->
				<div class="title">My music</div>
				<div class="img-singer">
					<img src="./img/music.jpg" alt="an-huynh" />
				</div>
			</div>
			<div class="col-lg-8">
				<div class="singer-list" id="music-container">
					<h1>Liked song</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<footer class="footer">
		<div class="footer-body">
			<div class="song-info">
				<div class="img-song">
					<img id="img-singer-footer" src="./img/music.jpg" alt="" />
				</div>
				<div class="song-name"></div>
				<!-- <div class="song-author">Đen Vâu</div> -->
			</div>
			<div class="music-status">
				<div class="music-timer">
					<p class="song-currTime">00:00</p>
					<p class="song-totalTime">00:00</p>
					<input value="0" type="range" name="music-timer" id="musicTimer" onchange="changeCurrentTime(this.value)" />
					<div class="volume-bar bi bi-volume-up-fill">
						<!-- <i class="bi bi-volume-up-fill"></i> -->
						<input value="1" type="range" name="volume" id="volume" max='1' min="0" step="0.01" onchange="changeVolume(this.value)">
					</div>
				</div>
				<div class="music-option">
					<div id="shuffle-btn" class="option-btn">
						<i class="bi bi-shuffle"></i>
					</div>
					<div id="prev-btn" class="option-btn">
						<i class="bi bi-skip-backward-circle"></i>
					</div>
					<div id="play-btn" class="option-btn play-btn" style="display: inline-block">
						<i class="bi bi-play-circle"></i>
					</div>
					<div id="pause-btn" class="option-btn pause-btn" style="display: none">
						<i class="bi bi-pause-circle"></i>
					</div>
					<div id="next-btn" class="option-btn">
						<i class="bi bi-skip-forward-circle"></i>
					</div>
				</div>
			</div>
		</div>
	</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
	<script src="./js/Likedsong.js"></script>
	<script src="./js/login.js"></script>
</body>
<!-- JavaScript Bundle with Popper -->

</html>