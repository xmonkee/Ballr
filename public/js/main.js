
$('.main-image-box').height(
	$('.main-image > img').height()
	);

var changeImage = function(){
	$('.main-image').attr('href', $(this).attr("href"));
	$('.main-image > img').attr('src', $(this).attr("href"));
	return false;
}

$('.image-loader').hover(changeImage).click(changeImage);

