<?php
/*
Template Name: Offices
*/
?>
<?php get_header(); ?>

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
 
<?php get_footer(); ?>