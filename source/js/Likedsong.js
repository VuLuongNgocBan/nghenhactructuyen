let isPlaying = true;
let playBtn = $("#play-btn");
let pauseBtn = $("#pause-btn");
let songNameFooter = $(".song-name");
let songNameAuthorFooter = $(".song-author");
let imgSingerFooter = $("#img-singer-footer");
let rangeBar = document.getElementById("musicTimer");
let songCurrTime = $(".song-currTime");
let songTotalTime = $(".song-totalTime");
let volume = $("#volume");
let nextBtn = $("#next-btn");
let prevBtn = $("#prev-btn");
let urlList = [];
let nameList;
let randomBtn = $("#shuffle-btn");
let randomBtnFlag = false;
const music = new Audio();

// load mucsic and render music into singer list song
//  Load and show song list from database to page

// =================================================================
// Load and show song list from database to page
function loadMusic(link) {
	$.ajax({
		url: link,
		dataType: "json",
		success: function (data) {
			show_data(data);
		},
		error: function (error) {
			// alert("Load fail");
		},
	});
}

//get and handle response

function show_data(data) {
	$("#volume").value = 1;

	let list_body = $("#music-container");
	//Handling add song to playlist

	//Handling remove song from playlist

	for (let i = 0; i < data.length; i++) {
		let row = data[i];
		$.post(
			"api/checkPlaylist.php",
			{
				songName: `${row.name}`,
			},
			function (res) {
				if (res == "true") {
					console.log(
						$(".song-heart" + i)
							.children(".bi-heart-fill")
							.show()
					);
					console.log(
						$(".song-heart" + i)
							.children(".bi-heart")
							.hide()
					);
				} else {
					console.log(
						$(".song-heart" + i)
							.children(".bi-heart-fill")
							.hide()
					);
					console.log(
						$(".song-heart" + i)
							.children(".bi-heart")
							.show()
					);
				}
			}
		);
		let _list = ` 	
				<div id="./musics/${row.url}" class="song-list">
					<div onclick='playMusic(${row.id})' class="song-info">
						<div id='${row.name}|${row.singer_name}' class="song-name ">${row.name}</div>
						<div id='${row.singer_name}' class="song-author ">${row.singer_name}</div>
						<img class="img-singer" src="${row.image}" style="display:none"/>
					</div>
	  				<div class="song-download">
					<a href="./musics/${row.url}" download> 
						<i class="bi bi-download download-btn"></i>
					</a>
					  
					</div>
					<div class="song-heart${i}">
						<i class="bi bi-heart"></i>
						<i class="bi bi-heart-fill" style="color: red; display: none"></i>
					</div>
					<audio class='${row.name} | ${row.singer_name}'  id='${row.id}' src="./musics/${row.url}" type='audio/mp3'>
					</audio>
				</div>
					`;
		list_body.append(_list);
	}

	$(".bi-heart").click(function () {
		let songName = $(this).parent().parent().children("div").children()[0].innerText;
		$(this).parent().children().show();
		$(this).hide();
		$.post(
			"api/addPlaylist.php",
			{
				songName: songName,
			},
			function (res) {
				alert(res);
			}
		);
	});

	$(".bi-heart-fill").click(function () {
		let songName = $(this).parent().parent().children("div").children()[0].innerText;
		$(this).parent().children().show();
		$(this).hide();
		$.post(
			"api/deletePlaylist.php",
			{
				songName: songName,
			},
			function (res) {
				alert(res);
			}
		);
	});
}
// bat dau load data =================================================================
$(function () {
	loadMusic("./api/LoadLikedsong.php");
	// end load mucsic and render music into singer list song
	// begin change button play
	let playBtn = document.getElementById("play-btn");
	let pauseBtn = document.getElementById("pause-btn");

	playBtn.addEventListener("click", function () {
		pauseBtn.style.display = "inline-block";
		playBtn.style.display = "none";
	});
	pauseBtn.addEventListener("click", function () {
		pauseBtn.style.display = "none";
		playBtn.style.display = "inline-block";
	});
	// end change button play

	// begin change text in play bar when click in singer list song

	// $(".song-list").css("border", "3px solid red");
	// console.log(songList);
});

function playMusic(audio) {
	//handle click on music in list song singer
	let url = document.getElementById(audio);
	music.src = url.src;

	// handle name footer
	let nameTmp = url.classList;
	let nameFooter = "";
	nameTmp.forEach((element) => {
		nameFooter += element + " ";
		// console.log(nameFooter);
	});
	// ./ handle name footer
	$(".footer  .song-name").text(nameFooter);
	// imgSingerFooter.attr("src", "." + document.getElementById("img-singer").src.slice(33));
	isPlaying = true;
	// music.load();
	if (isPlaying) {
		$("#play-btn").css("display", "none");
		$("#pause-btn").css("display", "inline-block");
		music.play();
		isPlaying = false;
	} else {
		$("#pause-btn").css("display", "none");
		$("#play-btn").css("display", "inline-block");

		music.pause();
		isPlaying = true;
	}
	// Array.from(document.getElementsByClassName("song-list")).forEach((element) => {
	// 	element.addEventListener("click", (e) => {
	// 		url = e.target.getAttribute("id");
	// 		console.log(url);
	// 		music.src = "./musics/ducphuc/traidatdepnhatkhicoem.mp3";
	// 		music.play();
	// 	});
	// });
	// handle click button play/pause

	// handle audio time range change
	rangeBar.addEventListener("onchange", handleChangeBar);
	function handleChangeBar() {}
	function displayTimer() {
		let { duration, currentTime } = music;
		rangeBar.value = currentTime;
		rangeBar.max = duration;
		songTotalTime.text(formatTimer(duration));
		songCurrTime.text(formatTimer(currentTime));
	}

	setInterval(() => {
		displayTimer();
		if (music.currentTime > music.duration - 0.05) {
			nextBtn.click();
		}
	}, 500);
	let index;
	function getCurrentSongList() {
		urlList = [];
		let songList = $(".song-list");
		nameList = $("#music-container .song-name");
		// console.log(nameList[0].id);
		for (let element of songList) {
			urlList.push(element.id);
		}
		currIndex = "." + url.src.slice(33);
		for (let i = 0; i < urlList.length; i++) {
			if (urlList[i] == currIndex) {
				index = i;
			}
		}
	}
	getCurrentSongList();

	nextBtn.click(function (e) {
		if ($("#play-btn").css("display") === "inline-block") {
			$("#play-btn").css("display", "none");
		}
		$("#pause-btn").css("display", "inline-block");
		index++;
		if (index >= urlList.length) {
			index = 0;
		}
		music.src = urlList[index];
		music.play();
		isPlaying = false;
		$(".footer .song-name").text(nameList[index].id);
	});
	prevBtn.click(function (e) {
		if ($("#play-btn").css("display") === "inline-block") {
			$("#play-btn").css("display", "none");
		}
		$("#pause-btn").css("display", "inline-block");
		index--;
		if (index < 0) {
			index = urlList.length - 1;
		}
		music.src = urlList[index];
		music.play();
		isPlaying = false;
		$(".footer  .song-name").text(nameList[index].id);
	});
}
document.addEventListener("keydown", function (event) {
	if (event.keyCode == 80) {
		pauseBtn.click();
	}
	if (event.keyCode == 82) {
		playBtn.click();
	}
});
playBtn.click(function (e) {
	if (isPlaying) {
		music.play();
		isPlaying = false;
	} else {
		music.pause();
		isPlaying = true;
	}
});
pauseBtn.click(function (e) {
	if (isPlaying) {
		music.play();
		isPlaying = false;
	} else {
		music.pause();
		isPlaying = true;
	}
});
function formatTimer(number) {
	const minutes = Math.floor(number / 60);
	const seconds = Math.floor(number - minutes * 60);
	if (minutes < 10 && seconds < 10) {
		return `0${minutes}:0${seconds}`;
	}
	return `0${minutes}:${seconds}`;
}
function changeStatusFooter(name, singerName, image) {
	songNameAuthorFooter.text(singerName);
	songNameFooter.text(name);
	imgSingerFooter.src(image);
}
function changeVolume(amount) {
	music.volume = amount;
	// console.log(music.volume);
	if (music.volume === 0) {
		$(".volume-bar").addClass("bi bi-volume-mute-fill");
		$(".volume-bar").removeClass("bi bi-volume-up-fill");
	} else {
		$(".volume-bar").removeClass("bi bi-volume-mute-fill");
		$(".volume-bar").addClass("bi bi-volume-up-fill");
	}
}
function changeCurrentTime(amount) {
	music.currentTime = amount;
}
function autoNextSong() {
	if (music.currentTime > music.duration - 1) {
		console.log("end song");
	}
}
