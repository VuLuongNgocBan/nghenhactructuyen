<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- CSS only -->
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
			crossorigin="anonymous" />
		<link rel="stylesheet" href="css/responsive.css" />
		<link rel="stylesheet" href="css/song_detail.css" />
		<link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css" />
		<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
		<link rel='shortcut icon' href='./icon/music.ico' />
		<title>Song Detail </title>
	</head>

	<body>
		<nav class="navbar">
			<div class="container">
				<h1 class="nav-left"><i class="mx-2 bi bi-boombox"></i>Music Page</h1>
				<div class="search">
					<i class="bi bi-search"></i>
					<input type="text" name="search-song" id="search-song" placeholder="Tìm kiếm" />
				</div>
				<div class="nav-right">
					<div class="user-avatar">
						<img src="./img/an-huynh.jpg" alt="" class="img-user" />
						<p class="user-name">User name</p>
					</div>
					<div class="nav-login d-inline">
						<a href="login.html" class="mx-2 login-btn text-decoration-none text-black p-1"
							>Log In
							<i class="bi bi-box-arrow-in-right"></i>
						</a>
					</div>

					<div class="nav-logout d-inline">
						<a href="./api/logOut.php" class="logout-btn text-decoration-none text-black p-1"
							>Log Out
							<i class="bi bi-box-arrow-right"></i>
						</a>
					</div>
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
							<li class="leftBody-myMusic">Liked song</li>
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
				
				<div class="col-lg-8 cur-song-detail">
					<div class="body-cur">
						<div class="row">
							<div class="col-lg-3 text-center">
								<!-- <input type="search" /> -->
								
								<div class="img-song">
									<img src="./img/an-huynh.jpg" alt="an-huynh" />
								</div>
							</div>
							<div class="col-lg-8 song-text">
                                <h1>Vì Anh Đâu Có Biết</h1>
								<p>Mahidu ft Vũ.</p>
								<div class = "song-des">
									<p>Song description</p>
								</div>
							</div>
						</div>
						<div class="col-lg song-button">
							<div class="row justify-content-between">
								<div class="col-4 play-button">
									<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-play" viewBox="0 0 16 16">
										<path d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/>
									</svg>
								</div>
								<div class="col-4 heart-download-button text-end">
									<svg id ="heart" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
										<path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
									</svg>
									<svg id = "download" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
										<path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
										<path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
									</svg>
								</div>
							</div>
						</div>
							<!-- <button type="button" class="btn btn-warning">Warning</button> -->
						<div class ="row justify-content-between">
								<h4 class="col-4 loibaihat">Lời bài hát</h4>
								<div class="col-4 text-end info">
									<p>Thể loại: </p>
									<p>Lượt xem: </p>
									<p>Đánh giá: </p>
								</div>
						</div>
						<div class="row song-lyric">
							<div class="col-lg-5">
								<p>[Chorus]
									Vì anh đâu có biết trái tim ngổn ngang
									Vì anh đâu có biết đúng sai ngỡ ngàng
									Vì anh luôn hối tiếc chiếc ôm dở dang
									Chìm trong đôi mắt biếc anh không thể mang
									Vì anh đâu có biết giấu đi thời gian
									Vì anh đâu có biết nắng mai đang tàn
									Vì anh luôn hối tiếc anh không thể mang
									Mùi hương trên mái tóc giữ theo câu chuyện đánh rơi
									
									[Verse 1]
									Loay hoay lạc trong từng cơn mưa ngu ngơ bước theo nơi đôi bờ mi đón đưa
									Bâng khuâng chìm trong làn mây thưa, em ơi có rơi vào nhạt nhòa hay chưa?
									Hay khi ngày em vô tình rơi, chơi vơi cuốn theo con tim này đi khắp nơi
									Ngân nga lời ca còn buông lơi mang theo đắm say ngày nào còn trên môi
									
									[Pre chorus 1]
									Bởi vì anh bởi vì anh
									Bởi vì anh bởi vì anh ú u ù
									
									[Verse 2]
									Em là mây trôi trong gió
									Anh là cây nhiều đắn đo
									Cành lá không còn xanh như giấc mơ của anh
									Rơi xuống, xuống đi tìm kiếm câu trả lời anh đánh rơi
									Vươn dài đôi tay ôm theo mây anh không có
									Khi ngày hôm nay còn lại gì ngoài lí do
									Nhìn áng mây mỏng manh, bay lướt qua thật nhanh
									Anh ngỡ ra rằng chính câu trả lời anh đánh rơi là
									
									[Outro]
									Vì anh đâu có biết giấu đi thời gian
									Vì anh đâu có biết bởi vì anh đâu có hay
									Rằng chính anh chẳng có em
								</p>
							</div>
						</div>
						<!-- Carousel list top song -->
						<div class="row">
							<h1>List Top Song's</h1>
							<div class="list-top-song">
								<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
									<div class="carousel-inner">
										<div class="carousel-item active">
											<div class="list-body">
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
											</div>
										</div>
										<div class="carousel-item">
											<div class="list-body">
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
											</div>
										</div>
										<div class="carousel-item">
											<div class="list-body">
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
											</div>
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
						<div class="singer-list">
							<div class="singer">Đen Vâu</div>
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
							<div class="singer">Trúc Nhân</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ./body -->
		<!-- footer -->
		<footer class="footer">
			<div class="footer-body">
				<div class="song-info">
					<div class="img-song">
						<img src="./img/an-huynh.jpg" alt="" />
					</div>
					<div class="song-name">Đưa nhau đi trốn |</div>
					<div class="song-author">Đen Vâu</div>
				</div>
				<div class="music-status">
					<div class="music-timer">
						<input type="range" name="music-time" id="" />
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
		</footer>
		<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
		<!-- <script src="./js/index.js"></script>
		<script src="./js/login.js"></script> -->
	</body>
	<!-- JavaScript Bundle with Popper -->
</html>
