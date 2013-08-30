
var setImageBox = function(){
	$('.main-image-box').height(Math.max(250 , $('.main-image > img').height()));
	// $('.main-image > img').height(getHeight());
}

// function getHeight(){
// 	var h = $('.main-image > img').height();
// 	var w = $('.main-image > img').width();
// 	var H = $('.main-image-box').height();
// 	var W = $('.main-image-box').width();
// 	if (w/h*H/W < 1) { return H; }
// 	else { return h/w*W; }
// }


var changeImage = function(){
	$('.main-image').attr('href', $(this).attr("href"));
	$('.main-image > img').attr('src', $(this).attr("href"));
	// $('.main-image > img').height(getHeight()));
	return false;
}

$(document).ready(setImageBox);
$('.image-loader').hover(changeImage).click(changeImage);

