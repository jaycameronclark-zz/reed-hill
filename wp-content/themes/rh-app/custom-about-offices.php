<?php
/*
Template Name: Offices
*/
?>
<?php get_header(); ?>

<script>
	$(function(){
		
		var dots = $(".star, .dot");
		var title = $(dots).find(">:first-child");
		title.hide();

		$(dots).each(function () {
		 	$(this).hover(function(){
		    title = $(this).find('.title');
		    title.fadeIn();
		 }, 
		 function() {
		 	title.fadeOut();
		 });
		});

		$(".contact-modal").click(function(){
			$("#contact-modal").modal("show");
		});

	});
</script>

<div class="grid--full">
		<section class="main-container" id="post-<?php the_ID(); ?>">
			<figure class="grid__item one-whole palm-one-whole offices">
				<div class="map-grid">
					<div class="grid__item one-whole palm-one-whole">
					<article class="content soft">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<span class="arrow"></span><?php the_content(); ?>
						<?php endwhile; ?>
						<?php endif; ?>
					</article>
					</div>
					<img src="<?php bloginfo( 'template_directory' ); ?>/_/images/offices-background.jpg" alt="">

					<span class="star denver"><i class="title">Denver, CO</i></span>
					<span class="star phoenix"><i class="title">Phoenix, AZ</i></span>
					<span class="dot mexico"><i class="title">Location</i></span>
					<span class="dot sa-1"><i class="title">Location</i></span>
					<span class="dot sa-2"><i class="title">Location</i></span>
				</div>
			</figure>
		</section>
</div>
 
<!-- Modal -->
<div id="contact-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <span class="close" data-dismiss="modal" aria-hidden="true"></span>
    <h3 id="myModalLabel"></h3>
  </div>
  <div class="modal-body">
    <p>Form goes here..</p>
  </div>
  <div class="modal-footer">

  </div>
</div>


<?php get_footer(); ?>
