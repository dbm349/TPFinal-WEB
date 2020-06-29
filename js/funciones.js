$(function() {
	
	$('.boton-fb').click(function(){
		open_window('http://www.facebook.com/sharer/sharer.php?u=');// url para compartir 
	});

	$('.boton-twitter').click(function(){
		open_window('http://twitter.com/share?url=');
	});

	$('.boton-google-plus').click(function(){
		open_window('https://plus.google.com/share?url=');
	});

	$('.boton-linkedin').click(function(){
		open_window('https://www.linkedin.com/shareArticle?mini=true&url=');
	});

	$('.boton-pinterest').click(function(){
		open_window('https://pinterest.com/pin/create/button/?url=');
	});
	

	function open_window(url, name){
		window.open(url, name, 'height=500, width=700, toolbar=no, menubar=no, scrollbars=yes, resizable=yes, location=no, directories=no, status=no');
	}
});