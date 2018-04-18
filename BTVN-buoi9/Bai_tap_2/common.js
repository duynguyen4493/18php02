var a, b;
document.getElementById('numberA').onkeyup = function() {
	a = this.value;
	a = parseFloat(a);
	// console.log(a);
} 
document.getElementById('numberB').onkeyup = function() {
	b = this.value;
	b = parseFloat(b);
	// console.log(b);
}
document.getElementById('result').onclick = function() {
	alert("gia tri a + b la: " + (a + b) + "\n" + 
		"gia tri a - b la: " + (a - b) + "\n" +
		"gia tri a x b la: " + (a * b) + "\n" +
		"gia tri a : b la: " + (a / b));
}
