<!-- ////////// Office /// -->
<?php
/*
Template Name: Office
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
				<div class="map-grid height800">
					<div class="grid__item one-whole palm-one-whole">
					<article class="content soft">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<span class="arrow"></span><?php the_content(); ?>
						<?php endwhile; ?>
						<?php endif; ?>
					</article>
					</div >
					<div class="full-width">
						<?php echo get_the_post_thumbnail($page->ID, 'inner-background'); ?>
					</div>

				</div>
			</figure>
		</section>
</div>


<?php get_footer(); ?>
