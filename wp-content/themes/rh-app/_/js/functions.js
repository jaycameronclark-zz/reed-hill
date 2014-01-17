/*! Functions written for Reed-Hill by Jay Clark
//@ Pivvt.com
*/


function shadowBox(){
	var $overlay = $("#shadow"),
			$selector = $("article.tile");

			$overlay.css("height", $(document).height());
			$overlay.hide();

			var showOverlay = function(){
				$overlay.fadeIn(400);
				$(this).css("z-index", "2000");
			};

			var hideOverlay = function(){
				$overlay.toggle();
				$(this).css("z-index", "0");
			};

			//use hoverintent plugin
			$selector.hoverIntent({
				over: showOverlay,
				out: hideOverlay,
				selector: $("article.tile")
			});

}

function imageGallery(){

	var width = 0;

	$(".gallery-inner img").each(function() {
		width += $(this).outerWidth( true );
	});
	$(".gallery-inner").css("width", width + "px");

}

function contactModal(){

	$(".contact").click(function(){
		$("#contact-modal").modal("show");
	});

}

function contactForm(){

	hideshow('loading',1);

		var name = $("#formName").val();
		var email = $("#formEmail").val();
		var message = $("#formMessage").val();
		var country = $("#formCountry").val();
		var honey = $("#honeyPot").val();
		var dataString = 'name='+ name + '&email=' + email + '&message=' + message + '&country=' + country + '&honey=' + honey;

		$.ajax({
			type: "POST",
			url: customPath + "/inc/form_process.php", //echoed in the dom
			data: dataString,
			dataType: 'json',
				success: function(data){

					if (data.status == '0'){
						//console.log(data);
							$("#messages").slideDown('slow', function(){
								$(this).addClass("failure").html(data.message);
								$(this).delay(2000).fadeOut(4000);
							});
						hideshow('loading',0);
					}
					else {
						//console.log(data);
						$("#contactForm")[0].reset();
						$("#contactForm").fadeOut('slow');
						$("#messages").addClass("success").html(data.message).show();
						$("#messages").delay(6000).fadeOut(4000);
						$("#contactForm").fadeIn('slow');

						hideshow('loading',0);
					}

				},
				error: function(jqXHR, exception, data) {
					if (jqXHR.status === 0) {
						console.log('Not connect.\n Verify Network.');
					} else if (jqXHR.status == 404) {
						console.log('Requested page not found. [404]');
					} else if (jqXHR.status == 'failure') {
						console.log('Internal Server Error [500].');
					} else if (exception === 'parsererror') {
						console.log('Requested JSON parse failed.');
					} else if (exception === 'timeout') {
						console.log('Time out error.');
					} else if (exception === 'abort') {
						console.log('Ajax request aborted.');
					} else {
						console.log('Uncaught Error.\n' + jqXHR.responseText);
					}
					hideshow('loading',0);
				}
		});
}

function hideshow(el,act) {
	if(act) $('#'+el).css('visibility','visible');
	else $('#'+el).css('visibility','hidden');
}

function locationMap(){
	var dots = $(".star, .dot");
	var title = $(dots).find(">:first-child");
	title.hide();

	$(dots).each(function () {
		$(this).hover(function(){
			title = $(this).find('.title');
			title.fadeIn();
	},function() {
			title.fadeOut();
		});
	});
}

$(function(){
//Init functions
	shadowBox();
	imageGallery();
	locationMap();
	contactModal();

	$("#contactForm").submit(function(e) {
		contactForm();
		e.preventDefault();
	});

});

