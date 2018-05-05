var checkEmpty = document.getElementsByClassName("box");
var checkRadio = document.getElementsByName("gender");
var displaySpan = document.getElementsByTagName("span");

document.getElementById("btn").onclick = function() {
	for (var i = 0; i < checkEmpty.length; i++) {
		if (checkEmpty[i].value === "" || (checkRadio[0].checked === false && checkRadio[1].checked === false)) {
			alert("Bạn phải điền đầy đủ thông tin");
			break;
		}
	}
	if (checkEmpty[3].value > checkEmpty[4].value) {
		alert("Ngay di khong vuot qua ngay den");
	}
	if (parseInt(checkEmpty[6].value) > parseInt(checkEmpty[5].value)) {
		alert("So tre em khong duoc lon hon nguoi lon");
	}
}
function hide(a) {
	checkEmpty[a].onkeyup = function() {
		displaySpan[a].style.display = "none";
	}
}
for (var i = 0; i < checkEmpty.length; i++) {
	hide(i);
}
checkEmpty[3].onclick = function() {
	displaySpan[3].style.display = "none";
}
checkEmpty[4].onclick = function() {
	displaySpan[4].style.display = "none";
}
