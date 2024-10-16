function showListSong(response) {
	console.log(response);
	// let singerName = $("#singer-name");
	let singerName;
	let listSongSinger = $("#music-container-singer");
	for (let i = 0; i < response.length; i++) {
		let row = response[i];
		$("#singer-name").text(row.singer_name);
		$(".story-title").text("Câu chuyện của " + row.singer_name);
		$("#singer-avatar").attr("src", row.image);
		console.log($("#singer-avatar img"));
		let item = `
        <div id="./musics/${row.url}" class="song-list">
					<div onclick='playMusic(${row.id})' class="song-info">
						<div id="${row.name}|${row.singer_name}" class="song-name">${row.name}</div>
						<div id='${row.singer_name}' class="song-author ">${row.singer_name}</div>
						<img class="img-singer" src="${row.image}" style="display:none"/>
					</div>
	  				<div class="song-download">
					<a href="./musics/${row.url}" download> 
						<i class="bi bi-download download-btn"></i>
					</a>
					  
					</div>
					<div class="song-heart${i} song-heart">
						<i class="bi bi-heart"></i>
						<i class="bi bi-heart-fill" style="color: red; display: none"></i>
					</div>
					<audio class='${row.name} | ${row.singer_name}'  id='${row.id}' src="./musics/${row.url}" type='audio/mp3'>
					</audio>
				</div>
        `;

		listSongSinger.append(item);
	}
}

function loadListSong() {
	$.ajax({
		url: "./api/loadSingerDetail.php",
		dataType: "json",
		success: function (response) {
			showListSong(response);
		},
	});
}
loadListSong();
