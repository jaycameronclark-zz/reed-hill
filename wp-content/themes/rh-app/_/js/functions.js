/*! Functions written for Reed-Hill by Jay Clark
//@ Pivvt Media
*/


$(function(){

function shadowBox(){

	$overlay = $("#shadow");
	$overlay.css("height", $(document).height()).hide();
	$selector = $(".tile");

		$selector.hover(function(){

			$overlay.fadeIn(280);
			$(this).css("z-index", "2000");

		}, function(){
				$overlay.toggle();
				$(this).css("z-index", "0");

		});
		//kill overlay on click
		$overlay.click(function() {
			$(this).toggle();
	});
}

function imageGallery(){

	var width = 0;

	$(".gallery-inner img").each(function() {
		width += $(this).outerWidth( true );
	});
	$(".gallery-inner").css("width", width + "px");

}

//Init functions
shadowBox();
imageGallery();

});

