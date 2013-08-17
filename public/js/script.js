$('.image-loader').on('click', function(e) 
{
	$('#main-image').attr('href', $(this).attr("href"));
	$('#main-image > img').attr('src', $(this).attr("href"));
	return false;
});
