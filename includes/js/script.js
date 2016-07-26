/*

My Custom JS
============

Author:  Brad Hussey
Updated: August 2013
Notes:	 Hand coded for Udemy.com

*/

$(function() {

	$('#alertMe').click(function(e) {

		e.preventDefault();

		$('#successAlert').slideDown();

	});

	$('a.pop').click(function(e) {
		e.preventDefault();
	});

	$('a.pop').popover();

	$('[rel="tooltip"]').tooltip();


});

$(function() {

	$('.alert').hide();

	$('.close[data-hide]').click(function () {
		$(this).closest('.alert').slideUp();
	});

	$('#alertMe').click(function(e) {

		e.preventDefault();

		$('#successAlert').slideDown();

	});

});


$(function() {

	$('#alertMe1').click(function(e) {

		e.preventDefault();

		$('#successAlert1').slideDown();

	});

	$('a.pop').click(function(e) {
		e.preventDefault();
	});

	$('a.pop').popover();

	$('[rel="tooltip"]').tooltip();


});

$(function() {

	$('#alertMe2').click(function(e) {

		e.preventDefault();

		$('#successAlert2').slideDown();

	});

	$('a.pop').click(function(e) {
		e.preventDefault();
	});

	$('a.pop').popover();

	$('[rel="tooltip"]').tooltip();


});