function repassword() {

	var pw = document.getElementById('password').value;
	var pw2 = document.getElementById('password2').value;

	if (pw != pw2) {
		window.alert("两次密码输入不一致，请重试");
		return false;
	}

	return true;



}

function phonenumr() {
	//var mPattern = "/^((13[0-9])|(14[5|7])|(15([0-3]|[5-9]))|(18[0,5-9]))\d{8}$/";
	var pn = document.getElementById('phoneNum').value;

	if (!(/^1[345678]\d{9}$/.test(pn))) {

		window.alert("手机号格式有误，请重新输入");

		return false;
	}
	return true;
}

function cansub() {
	if (repassword()  && phonenumr()) {

		return true;
	}else{

		alert("信息有误请重新输入1");
		return false;

	}

	

}