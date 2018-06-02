$(document).ready( function() {
	year = $("#year");
	month = $("#month");
	day = $("#day");
	var today = new Date();
	for (var i = 1980; i <= today.getFullYear(); i++) {
		year.append('<option value='+i+'>'+i+'</option>');
	}
	for(var i = 1; i <= 12; i++) {
		month.append('<option value='+i+'>'+i+'</option>');
	}
	function getDay() {
		var value = parseInt(month.val());
		var numberDay;
		switch (value) {
			case 2:
			if ((year.val() % 4 == 0) && (year.val() % 100 != 0 || year.val() % 400 == 0)) {
				numberDay = 29;
			} else {numberDay = 28;}
			break;
			case 1: case 3: case 5: case 7: case 8: case 10: case 12:
			numberDay = 31;
			break;
			case 4: case 6: case 9: case 11:
			numberDay = 30;
			break;
		}
		var html = '';
		for(var i = 1; i <= numberDay; i++) {
			html += '<option value='+i+'>'+i+'</option>';
		}
		day.html(html);
	}
	getDay();
	month.change(function() {
		getDay();
	})
	year.change(function() {
		if (month.val() == '2') 
			getDay();
	})
})
