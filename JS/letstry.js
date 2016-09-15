$(document).ready(function() {

$('#puthere').load($('.tab:first').attr('href'));


})

$('.tab').click(function() {
var link = $(this).attr('href');
$('#puthere').hide().load(link).fadeIn('normal');
return false;
});


