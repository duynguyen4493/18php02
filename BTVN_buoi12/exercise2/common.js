//jquery---->
$(document).ready(function() {
	var currentSlide = 1;
	var slide = $(".slider");
	var list = $("li");
	function showSlider(a) {
		if (a > slide.length) {
			currentSlide = 1;
		}
		if (a < 1) {
			currentSlide = slide.length;
		}
		for (var i = 0; i < slide.length; i++) {
			$(slide[i]).hide();
			$(list[i]).removeClass("active");
		}
		$(slide[currentSlide-1]).show();
		$(list[currentSlide-1]).addClass("active");
	}
	showSlider(currentSlide);
	//bắt sự kiện click button prevew và next---->
	$("a#prev").click(function() {
		showSlider(currentSlide -= 1);
	});
	$("a#next").click(function() {
		showSlider(currentSlide += 1);
	});
	//bắt sự kiện click từng slide----->
	list.click(function() {
		var a = $(this).index() + 1;
		showSlider(currentSlide = a);
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

