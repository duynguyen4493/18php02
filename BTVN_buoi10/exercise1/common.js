var genderHobby, a;
document.getElementById("name").onkeyup = function() {
	document.getElementById("text").innerHTML = this.value;
}
document.getElementById("age").onkeyup = function() {
	a = this.value;
}

document.getElementById('male').onclick = function () {
	genderHobby = "maleHobby";
	document.getElementById("avatar").src = "lib/male.jpg";
	document.getElementById("text").style.color = "red";
	document.getElementById("maleList").style.display = "block";
	document.getElementById("femaleList").style.display = "none";
}

document.getElementById('female').onclick = function () {
	genderHobby = "femaleHobby";
	document.getElementById("avatar").src = "lib/female.jpg";
	document.getElementById("text").style.color = "blue";
	document.getElementById("maleList").style.display = "none";
	document.getElementById("femaleList").style.display = "block";
	if (a >= 1997) {
		document.getElementById("text").style.color = "yellow";
		document.getElementById("text").style.fontSize = "30px";
	}
}

// description: Hàm check sở thích của từng giới tính.
// - tạo biến checkBox gán bằng thẻ có tên class là a.
// - khởi tạo biến Result.
// - tạo vòng lặp kiếm tra từng ô đã checked chưa.
// - nếu ô đã tick thì cộng thêm value ô đó cho biến Result,
// nếu k được tích thì gán giá trị rỗng cho nó.
// - kiểm tra điều kiện Result rỗng hay không và in ra  kết quả.
function checkHobby (a) {
	var checkBox = document.getElementsByClassName(a);
	var Result= "";
	for (var i = 0; i < checkBox.length; i++) {
		if (checkBox[i].checked) {
			Result += "(" + checkBox[i].value +")";
		}
		else {
			Result += "";
		}
	}
	if (Result != "") {
		alert("So thich cua nguoi nay la: " + Result);
	}
	else {
		alert("Nguoi nay khong thich gi ca");
	}
}
document.getElementById("btn").onclick = function() {
	if (genderHobby == "maleHobby") {
		checkHobby(genderHobby);
	}
	else if(genderHobby == "femaleHobby") {
		checkHobby(genderHobby);
	}
}
