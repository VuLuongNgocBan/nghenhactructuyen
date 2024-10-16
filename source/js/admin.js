const songM = $("#songManage");
const categoryM = $("#categoryManage");
const userM = $("#userManage");
const singerM = $("#singerManage");
// load music_list
function load_music(link) {
	$.ajax({
		url: link,
		dataType: "json",
		success: function (data) {
			show_music(data);
		},
		error: function (error) {
			// alert("Load fail");
		},
	});
}

function show_music(data){
    let songBody = $("#songBody");
    for(let i = 0; i < data.length; i++){
        let r = data[i];
        
        let tr = `
            <tr>
                <td>
                    ${r.id}
                </td>
                
                <td>
                    ${r.name}
                </td>               
                <td>
                    ${r.singer_name}
                </td>
                
                <td>
                    ${r.category_name}
                </td>
                
                <td>
                    <img src=${r.image} width="100px" height="100px">
                </td>
                <td>
                    <button class="editBtn btn btn-primary">Chỉnh sửa</button>
                    <button class="deleteBtn btn btn-danger">Xóa</button>
                </td>
            </tr>
        `
        songBody.append(tr);
    }
    //active 2 button above

    //edit btn
    $(".editBtn").click(function(){
        let thisRow = $(this).parent().parent().children();
        let songID = thisRow[0].innerText;
        let songName = thisRow[1].innerText;
        $("#update-song-name").val(songName);
        $("#update-song-id").val(songID);
        $("#updateMusicModal").modal({
            backdrop: 'static',
            keyboard: false
        });
    })

    //delete button
    $(".deleteBtn").click(function(){
        let songID = $(this).parent().parent().children()[0].innerText;
        let songName = $(this).parent().parent().children()[1].innerText;
        $("#songId").val(songID);
        $("#songDeleteText").html("Bạn có muốn xóa \"" +songName+"\" ra khỏi danh sách");
        $("#deleteMusicModal").modal({
            backdrop: 'static',
            keyboard: false
        });
    })

}   

//singer part

function load_singer(link) {
	$.ajax({
		url: link,
		dataType: "json",
		success: function (data) {
			show_singer(data);
		},
		error: function (error) {
			// alert("Load fail");
		},
	});
}

function show_singer(data){
    let singerBody = $("#singerBody");
    let singer_add_list = $("#add-song-singer")
    let singer_update_list = $("#update-song-singer")
    for(let i =0; i < data.length; i++){
        let r = data[i];
        let tr = `<tr>
            <td>
                ${r.id}
            </td>
                
            <td>
            <image src=${r.image} width="100px" height="100px">
            </td>
           
            <td>
                ${r.name}
            </td>
            
            <td>
                <button class="editSBtn btn btn-primary">Chỉnh sửa</button>
            </td>
        </tr>`;
        let opt=`<option value=${r.id}>${r.name}</option>`;
        singer_add_list.append(opt);
        singer_update_list.append(opt);
        singerBody.append(tr);
    }
    $(".editSBtn").click(function(){
        let id = $(this).parent().parent().children()[0].innerText;
        let name = $(this).parent().parent().children()[2].innerText;
        $("#update-singer-id").val(id);
        $("#update-singer-name").val(name);
        $("#updateSingerModal").modal({
            backdrop: 'static',
            keyboard: false
        });
    });
}
//singer update
$("#updateSingerForm").submit(function(){
    $.ajax({
        type: 'POST',
        url: './api/addCate.php',
        data: $(this).serialize(),
        success: function (response1) {
            var jsonData1 = JSON.parse(response1);

            // user is logged in successfully in the back-end
            // let's redirect
            if (jsonData1.code == "1") {
                alert(jsonData1.message);
                location.href = './admin.php';
            }
            else {
            
            }
        }
    });
})

//user part

function load_user(link) {
	$.ajax({
		url: link,
		dataType: "json",
		success: function (data) {
			show_user(data);
		},
		error: function (error) {
			// alert("Load fail");
		},
	});
}

function show_user(data){
    let userBody = $("#userBody");
    for(let i = 0; i < data.length; i++){
        let r = data[i];
        
        let tr = `
            <tr>
                <td>
                    ${r.id}
                </td>
                
                <td>
                    ${r.name}
                </td>               
                <td>
                    ${r.username}
                </td>
                
                <td>
                    ${r.password}
                </td>
                
                <td>
                    ${r.email}
                </td>

                <td>
                    <button class="editBtnUser btn btn-primary">Chỉnh sửa</button>
                    <button class="deleteBtnUser btn btn-danger">Xóa</button>
                </td>
            </tr>
        `
        userBody.append(tr);
    }
    //active 2 button above

    //update button
    $(".editBtnUser").click(function(){
        let thisRow = $(this).parent().parent().children();
        let userID = thisRow[0].innerText;
        let username = thisRow[2].innerText;
        $("#update-user-id").val(userID);
        $("#update-user-username").val(username);
        $("#updateUserModal").modal({
            backdrop: 'static',
            keyboard: false
        });
    })

    //delete button
    $(".deleteBtnUser").click(function(){
        let userID = $(this).parent().parent().children()[0].innerText;
        let name = $(this).parent().parent().children()[1].innerText;
        let email = $(this).parent().parent().children()[4].innerText;
        $("#userId").val(userID);
        $("#userDeleteText").html("Bạn có muốn xóa người dùng có tên \"" +name+"\" có email \"" +email+"\" ra khỏi danh sách");
        $("#deleteUserModal").modal({
            backdrop: 'static',
            keyboard: false
        });
    })

}

//category part

function load_category(link){
    $.ajax({
		url: link,
		dataType: "json",
		success: function (data) {
			show_category(data);
		},
		error: function (error) {
			// alert("Load fail");
		},
	});
}

function show_category(data){
    let category_add = $("#add-song-category")
    let category_update = $("#update-song-category")
    let category_body = $("#categoryBody")
    for(let i = 0; i < data.length; i++){
        let r = data[i];
        let opt =`
            <option value=${r.id}>${r.name}</option>
        `
        let tr = `
            <tr>
                <td colspan="2">
                    ${r.id}
                </td>
                <td colspan="8">
                    ${r.name}
                </td>
                <td colspan="2">
                    <button class="btn btn-primary editCaBtn">Chỉnh sửa</button>
                </td>
            </tr>
        `;
        category_add.append(opt);
        category_update.append(opt);
        category_body.append(tr);
    }
    // Kích hoạt modal xóa và sửa thể loại âm nhạc
    $(".editCaBtn").click(function(){
        let caName = $(this).parent().parent().children()[1].innerText;
        let caId = $(this).parent().parent().children()[0].innerText;
        $("#ca-edit-name").val(caName);
        $("#ca-edit-id").val(caId);
        $("#editCaModal").modal({
            backdrop: 'static',
            keyboard: false
        });
    });
}




$(document).ready(function() {
	//Phân trang
    load_music("./api/adminController/loadMusic.php");
    load_singer("./api/adminController/loadSinger.php")
    load_user("./api/adminController/LoadUser.php");
    load_category("./api/adminController/loadCategory.php");

    $("#song").click(function(){
        songM.css("display","block");
        categoryM.css("display","none");
        userM.css("display","none");
        singerM.css("display","none");
    })
    $("#category").click(function(){
        songM.css("display","none");
        categoryM.css("display","block");
        userM.css("display","none");
        singerM.css("display","none");
    })
    $("#user").click(function(){
        songM.css("display","none");
        categoryM.css("display","none");
        userM.css("display","block");
        singerM.css("display","none");
    })
    $("#singer").click(function(){
        songM.css("display","none");
        categoryM.css("display","none");
        userM.css("display","none");
        singerM.css("display","block");
    })

    //Hiện modal thêm nhạc

    $(".addMusicBtn").click(function(e) {
        e.preventDefault();
           console.log('a');
           $("#addMusicModal").modal({
            backdrop: 'static',
            keyboard: false
        });
    })
    
    //xử lý xóa nhạc
    $("#deleteSongForm").submit(function(){
        $.ajax({
            type: 'POST',
            url: './api/adminController/deleteMusic.php',
            data: $(this).serialize(),
            success: function (response1) {
                var jsonData1 = JSON.parse(response1);

                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData1.code == "1") {
                    alert(jsonData1.message);
                    location.href = './admin.php';
                }
                else {
                
                }
            }
        });
    })

//thêm sửa thể loại
   
        $(".addCaBtn").click(function(e) {
            e.preventDefault();
               console.log('a');
               $("#addCaModal").modal({
                backdrop: 'static',
                keyboard: false
            });
        });
    
    $("#editCaForm").submit(function(){
        $.ajax({
            type: 'POST',
            url: './api/updateCate.php',
            data: $(this).serialize(),
            success: function (response1) {
                var jsonData1 = JSON.parse(response1);

                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData1.code == "1") {
                    alert(jsonData1.message);
                    location.href = './admin.php';
                }
                else {
                
                }
            }
        });
    })

    $("#addCaForm").submit(function(){
        $.ajax({
            type: 'POST',
            url: './api/addCate.php',
            data: $(this).serialize(),
            success: function (response1) {
                var jsonData1 = JSON.parse(response1);

                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData1.code == "1") {
                    alert(jsonData1.message);
                    location.href = './admin.php';
                }
                else {
                
                }
            }
        });
    })

    //xử lý xóa user
    $("#deleteUserForm").submit(function(){
        $.ajax({
            type: 'POST',
            url: './api/adminController/deleteUser.php',
            data: $(this).serialize(),
            success: function (response1) {
                var jsonData1 = JSON.parse(response1);

                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData1.code == "1") {
                    alert(jsonData1.message);
                    location.href = './admin.php';
                }
                else {
                
                }
            }
        });
    })

    //update user
    $("#updateUserBtn").submit(function(){
        $.ajax({
            type: 'POST',
            url: './api/updateUser.php',
            data: $(this).serialize(),
            success: function (response1) {
                var jsonData1 = JSON.parse(response1);

                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData1.code == "1") {
                    alert(jsonData1.message);
                    location.href = './admin.php';
                }
                else {
                
                }
            }
        });
    })
    $('.addSingerBtn').click(function(){
        $("#addSingerModal").modal({
            backdrop: 'static',
            keyboard: false
        });
    });
    

});