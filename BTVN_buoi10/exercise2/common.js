// var  hoverName = document.getElementsByClassName("name");
// 	for (var i = 0; i < hoverName.length; i++) {
// 		hoverName[i].onmouseover = function() {
// 		var a = this.value;
// 		alert(a);
// 		}
// 	}
document.getElementById("messi").onmouseover = function() {
	document.getElementById("avatar").src = "lib/mesi.jpg";
	document.getElementById("screen").innerHTML = "Sinh năm: 1987 Quốc tịch: Argentina";
}
document.getElementById("ronaldo").onmouseover = function() {
	document.getElementById("avatar").src = "lib/ronaldo.jpg";
	document.getElementById("screen").innerHTML = "Sinh năm: 1985 Quốc tịch: Bồ Đào Nha";
}
document.getElementById("pogpa").onmouseover = function() {
	document.getElementById("avatar").src = "lib/pogpa.jpg";
	document.getElementById("screen").innerHTML = "Sinh năm: 1993 Quốc tịch: Pháp";
}
document.getElementById("sanchez").onmouseover = function() {
	document.getElementById("avatar").src = "lib/sanchez.jpg";
	document.getElementById("screen").innerHTML = "Sinh năm: 1988 Quốc tịch: Chi lê";
}
