<?php
require_once("./api/connection.php");
session_start();
$_SESSION['idSinger'] = $_GET['id'];
// echo $_SESSION['idSinger'];
// echo $_SESSION['idSinger'];


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
	<link rel="stylesheet" href="css/singer_detail.css" />
	<link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css" />
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
	<link rel='shortcut icon' href='./icon/music.ico' />
	<title>Singer Detail </title>
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
	<!-- ./navbar -->
	<!-- body -->
	<div class="container-fluid">
		<div class="row top-music">
			<div class="col-lg-2 left-body">
				<div class="left-body-container">
					<span class="leftBody-title">Recommend</span>
					<ul class="list-option">
						<li class="leftBody-recommend item1">For you</li>
						<li class="leftBody-recommend item2">Library</li>
						<li class="leftBody-recommend item3">Radio Station</li>
						<li class="leftBody-recommend item4">Music Video</li>
						<li class="leftBody-recommend item5">Recent</li>
					</ul>
					<span class="leftBody-title">My music</span>
					<ul class="list-option">
						<li class="leftBody-myMusic"><a class="text-decoration-none text-dark" href="Liked_song.php">Liked song</a></li>
						<li class="leftBody-myMusic">Album</li>
						<li class="leftBody-myMusic">Artist</li>
						<li class="leftBody-myMusic">Recent</li>
					</ul>
					<span class="leftBody-title">Playlist</span>
					<ul class="list-option">
						<li class="leftBody-playList item1">Rap</li>
						<li class="leftBody-playList item2">Pop</li>
						<li class="leftBody-playList item3">Trap</li>
						<li class="leftBody-playList item4">Dance</li>
					</ul>
				</div>
			</div>

			<div class="col-lg-8 cur-singer-detail">
				<div class="body-cur">
					<div class="col-lg background">
						<div class="row">
							<div class="col-lg-3 text-center">
								<div class="img-singer">
									<img id="singer-avatar" src="./img/music.jpg" alt="vu" />
								</div>
							</div>
							<div class="col-lg-2 singer-text">
								<h1 id="singer-name"></h1>
								<p>Việt Nam</p>
							</div>
							<div class="col-lg-6">
								<div class="text-end follow-button">
									<button type="button" class="btn btn-outline-danger" data-mdb-ripple-color="dark">Theo dõi +</button>
								</div>
							</div>
						</div>
					</div>

					<!-- <button type="button" class="btn btn-warning">Warning</button> -->
					<h3 class="col-lg story-title mt-1"></h3>
					<p class="col-lg singer-des">Trước khi nổi tiếng, Vũ. thường đăng tải các sáng tác của mình trên Soundcloud. Thể loại của anh theo đuổi là nhạc Indie Pop, Acoustic, Rock... .
						Năm 2016, Vũ. phát hành các sáng tác của anh và gặt hái được thành công trong giới indie Việt. Các hit tiêu biểu của Vũ. với "Đông Kiếm Em", "Mùa Mưa Ngâu Nằm Cạnh", "Chuyện Những Người Yêu Xa", và album "Vũ Trụ Song Song" ra mắt năm 2019.
						Năm 2020, Vũ. ký hợp đồng với Warner Music Group và trở thành nghệ sĩ trực thuộc công ty.</p>
					<h3 class="col-lg popular-song">Bài hát phổ biến</h3>

					<!-- list nhac pho bien -->
					<div class="row list-song-singer name-song" id="music-container-singer">
						<!-- <div class="col-lg-5 song-list">
							<div class="song-info">
								<div class="song-name">Vì anh đâu có biết</div>
								<div class="song-author">Madihu ft Vũ.</div>
							</div>
						</div>
						<div class="col-lg-5 song-list">
							<div class="song-info">
								<div class="song-name">Vì anh đâu có biết</div>
								<div class="song-author">Madihu ft Vũ.</div>
							</div>
						</div>
						<div class="col-lg-5 song-list">
							<div class="song-info">
								<div class="song-name">Vì anh đâu có biết</div>
								<div class="song-author">Madihu ft Vũ.</div>
							</div>
						</div>
						<div class="col-lg-5 song-list">
							<div class="song-info">
								<div class="song-name">Vì anh đâu có biết</div>
								<div class="song-author">Madihu ft Vũ.</div>
							</div>
						</div>
						<div class="col-lg-5 song-list">
							<div class="song-info">
								<div class="song-name">Vì anh đâu có biết</div>
								<div class="song-author">Madihu ft Vũ.</div>
							</div>
						</div>
						<div class="col-lg-5 song-list">
							<div class="song-info">
								<div class="song-name">Vì anh đâu có biết</div>
								<div class="song-author">Madihu ft Vũ.</div>
							</div>
						</div>
						<div class="col-lg-5 song-list">
							<div class="song-info">
								<div class="song-name">Vì anh đâu có biết</div>
								<div class="song-author">Madihu ft Vũ.</div>
							</div>
						</div>
						<div class="col-lg-5 song-list">
							<div class="song-info">
								<div class="song-name">Vì anh đâu có biết</div>
								<div class="song-author">Madihu ft Vũ.</div>
							</div>
						</div> -->

					</div>
					<br><br>
					<!-- Carousel list top song -->
					<div class="row">
						<h4>List Top Song's</h4>
						<div class="list-top-song">
							<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
								<div class="carousel-inner">
									<div class="carousel-item active carousel-item1">
										<!-- <div class="list-body">
											<div class="list-item">
												<div class="img-song">
													<img src="./img/an-huynh.jpg" alt="" />
												</div>
												<div class="song-name">Đưa nhau đi trốn</div>
											</div>
											<div class="list-item">
												<div class="img-song">
													<img src="./img/an-huynh.jpg" alt="" />
												</div>
												<div class="song-name">Đưa nhau đi trốn</div>
											</div>
											<div class="list-item">
												<div class="img-song">
													<img src="./img/an-huynh.jpg" alt="" />
												</div>
												<div class="song-name">Đưa nhau đi trốn</div>
											</div>
											<div class="list-item">
												<div class="img-song">
													<img src="./img/an-huynh.jpg" alt="" />
												</div>
												<div class="song-name">Đưa nhau đi trốn</div>
											</div>
										</div> -->
									</div>
									<div class="carousel-item carousel-item2">
										<!-- <div class="list-body">
											<div class="list-item">
												<div class="img-song">
													<img src="./img/an-huynh.jpg" alt="" />
												</div>
												<div class="song-name">Đưa nhau đi trốn</div>
											</div>
											<div class="list-item">
												<div class="img-song">
													<img src="./img/an-huynh.jpg" alt="" />
												</div>
												<div class="song-name">Đưa nhau đi trốn</div>
											</div>
											<div class="list-item">
												<div class="img-song">
													<img src="./img/an-huynh.jpg" alt="" />
												</div>
												<div class="song-name">Đưa nhau đi trốn</div>
											</div>
											<div class="list-item">
												<div class="img-song">
													<img src="./img/an-huynh.jpg" alt="" />
												</div>
												<div class="song-name">Đưa nhau đi trốn</div>
											</div>
										</div> -->
									</div>
									<div class="carousel-item carousel-item3">
										<!-- <div class="list-body">
											<div class="list-item">
												<div class="img-song">
													<img src="./img/an-huynh.jpg" alt="" />
												</div>
												<div class="song-name">Đưa nhau đi trốn</div>
											</div>
											<div class="list-item">
												<div class="img-song">
													<img src="./img/an-huynh.jpg" alt="" />
												</div>
												<div class="song-name">Đưa nhau đi trốn</div>
											</div>
											<div class="list-item">
												<div class="img-song">
													<img src="./img/an-huynh.jpg" alt="" />
												</div>
												<div class="song-name">Đưa nhau đi trốn</div>
											</div>
											<div class="list-item">
												<div class="img-song">
													<img src="./img/an-huynh.jpg" alt="" />
												</div>
												<div class="song-name">Đưa nhau đi trốn</div>
											</div>
										</div> -->
									</div>
								</div>
								<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Previous</span>
								</button>
								<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Next</span>
								</button>
							</div>
						</div>
					</div>
					<!-- ./ Carousel list top song-->
				</div>
			</div>
			<div class="col-lg-2 right-body">
				<div class="recent-song right-body-container">
					<h5 class="top-singer">Top Singer 2022</h5>
					<div class="singer-list" id="singerlist">
						<!-- <div class="singer">Đen Vâu</div>
						<div class="singer">Sơn Tùng</div>
						<div class="singer">Tài Smile</div>
						<div class="singer">Trúc Nhân</div>
						<div class="singer">Đen Vâu</div>
						<div class="singer">Sơn Tùng</div>
						<div class="singer">Tài Smile</div>
						<div class="singer">Trúc Nhân</div>
						<div class="singer">Đen Vâu</div>
						<div class="singer">Sơn Tùng</div>
						<div class="singer">Tài Smile</div>
						<div class="singer">Trúc Nhân</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ./body -->
	<!-- footer -->
	<!-- <footer class="footer">
		<div class="footer-body">
			<div class="song-info">
				<div class="img-song">
					<img src="./img/music.jpg" alt="" />
				</div>
				<div class="song-name"></div>
				<div class="song-author"></div>
			</div>
			<div class="music-status">
				<div class="music-timer">
					<input type="range" name="music-time" id="musicTimer" />
				</div>
				<div class="music-option">
					<div id="shuffle-btn" class="option-btn">
						<i class="bi bi-shuffle"></i>
					</div>
					<div id="backward-btn" class="option-btn">
						<i class="bi bi-skip-backward-circle"></i>
					</div>
					<div id="play-btn" class="option-btn play-btn" style="display: inline-block">
						<i class="bi bi-play-circle"></i>
					</div>
					<div id="pause-btn" class="option-btn pause-btn" style="display: none">
						<i class="bi bi-pause-circle"></i>
					</div>
					<div id="forward-btn" class="option-btn">
						<i class="bi bi-skip-forward-circle"></i>
					</div>
				</div>
			</div>
		</div>
	</footer> -->
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
	<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<script src="./js/index.js"></script>
	<script src="./js/login.js"></script>
	<script src="./js/singerDetail.js"></script>
</body>
<!-- JavaScript Bundle with Popper -->

</html>