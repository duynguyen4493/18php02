//jquery---->
$(document).ready(function() {
	var currentSlide = 1;
	function showSlider(a) {
		var slide = $(".slider");
		if (a > slide.length) {
			currentSlide = 1;
		}
		if (a < 1) {
			currentSlide = slide.length;
		}
		for (var i = 0; i < slide.length; i++) {
			$(slide[i]).hide();
		}
		$(slide[currentSlide - 1]).show();
	}
	showSlider(currentSlide);
	$("#prev").on("click", function() {
		showSlider(currentSlide -= 1);
	});
	$("#next").on("click", function() {
		showSlider(currentSlide += 1);
	});
});

//javascript----->

// var currentSlide = 1;
// function showSlider(a) {
// 	var slide = document.getElementsByClassName("slider");
// 	if (a > slide.length) {
// 		currentSlide = 1;
// 	}
// 	if (a < 1) {
// 		currentSlide = slide.length;
// 	}
// 	for (var i = 0; i < slide.length; i++) {
// 		slide[i].style.display = "none";
// 	}
// 	slide[currentSlide - 1].style.display = "block";
// }
// showSlider(currentSlide);
// document.getElementById("prev").onclick = function() {
// 	showSlider(currentSlide -= 1);
// }
// document.getElementById("next").onclick = function() {
// 	showSlider(currentSlide += 1);
// }

