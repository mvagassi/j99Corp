$(document).ready(function () {
	$('body').bind('cut copy paste', function (e) {
		e.preventDefault();
	})
	$("body").on("contextmenu", function (e) {
		document.onkeydown = function (e) {
			if (event.keyCode == 123) {
				return false;
			}
			if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
				return false;
			}
			if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
				return false;
			}
			if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
				return false;
			}
			if (e.ctrlKey && e.keyCode == 'C'.charCodeAt(0)) {
				return false;
			}
			if (e.keyCode == 'F12'.charCodeAt(0)) {
				return false;
			}
			if (e.ctrlKey && e.keyCode == 'F12'.charCodeAt(0)) {
				return false;
			}
			if (e.ctrlKey &&
				(e.keyCode === 67 ||
					e.keyCode === 86 ||
					e.keyCode === 85 ||
					e.keyCode === 117)) {

				return false;
			}else{
                return false;
            }
		}
		return false;
	})
})
