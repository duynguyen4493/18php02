// $(document).ready(function () {

// 	$('button').on('click', function () {
// 		var text = $('#area').val();
// 		var q = $('input[name=q]').val();
// 		// console.log(q);
// 		var newType = new RegExp(q, 'g');
// 		var str = text.match( newType );
// 		console.log(typeof $(str).length);
// 		if (q == "" || $(str).length == 0) {
// 			$('#print').html(text);
// 			$('#match').html("so chuoi trung lap la: 0");
// 		}
// 		else {
// 			var rePlace = text.replace(newType, '<span style="color: yellow;"">'+q+'</span>');
// 			$('#print').html(rePlace);
// 			$('#match').html("so chuoi trung lap la:" + $(str).length);
// 		}
// 	})
// })

$(document).ready(function () {

	$('button').on('click', function () {
		var text = $('#area').val();
		var q = $('input[name=q]').val();
		// console.log(q);
		var newType = new RegExp(q, 'g');
		var str = text.match( newType );
		console.log(typeof $(str).length);
		var rePlace = text.replace(newType, '<span style="color: yellow;"">'+q+'</span>');
		$('#print').html(rePlace);
		if (q == "") {
			$('#match').html("Bạn chưa nhập từ khóa");
		}
		else {
			$('#match').html("Số chuỗi trùng lặp là: " + $(str).length);
		}
	})
})