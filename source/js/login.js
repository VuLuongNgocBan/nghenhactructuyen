let register = document.getElementById("register");
let login = $("#login-btn");
let registerForm = document.getElementById("register-form");
let loginForm = document.getElementById("login-form");

login.click(function () {
	// alert("ahihi");
	loginForm.style.display = "block";
	registerForm.style.display = "none";
	// $("#login-form").show();
	// $("#register-form").hide();
});
register.addEventListener("click", function () {
	// alert("ahihi");

	loginForm.style.display = "none";
	registerForm.style.display = "block";
	// $("#login-form").hide();
	// $("#register-form").show();
});

// handle login form
$("#login").submit(function (e) {
	e.preventDefault();
	$.ajax({
		type: "post",
		url: "./api/login.php?v=1",
		data: $(this).serialize(),
		success: function (response) {
			let jsonData = JSON.parse(response);
			if (jsonData.statusCode === 200) {
				location.href = "index.php";
				$(".user-name").text(jsonData.userName);
			}
			if (jsonData.statusCode === 400) {
				alert(jsonData.message);
			}
		},
	});
});
// ./handle login form
// handle register form
$(".register-form").submit(function (e) {
	e.preventDefault();
	let username = $("#username-regist").val();
	let email = $("#email-regist").val();
	let password = $("#password-regist").val();
	let confirmPassword = $("#confirm-password-regist").val();
	if (username != "" && email != "" && password != "" && confirmPassword != "") {
		if (password === confirmPassword) {
			$.ajax({
				type: "post",
				url: "./api/signUp.php?v=1",
				data: $(this).serialize(),
				success: function (response) {
					let jsonData = JSON.parse(response);
					if (jsonData.statusCode === 200) {
						alert(jsonData.message);
						location.href = "login.html";
					}
					if (jsonData.statusCode === 400) {
						// alert(jsonData.message);
						$(".error-msg").text(jsonData.message);
						$(".error-msg").css("display", "block");
					}
				},
			});
		} else {
			$(".error-msg").text("Mật khẩu xác nhận không chính xác!");
			$(".error-msg").css("display", "block");
		}
	} else {
		$(".error-msg").text("Vui lòng điền đầy đủ thông tin!");
		$(".error-msg").css("display", "block");
	}
});
$("#register-form").click(function () {
	if ($(".error-msg").css("display") == "block") {
		$(".error-msg").css("display", "none");
	}
});
