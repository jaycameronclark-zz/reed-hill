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
					<span class="dot mexico"><i class="title">Mexico</i></span>
					<span class="dot sa-1"><i class="title">ARGENTINA</i></span>
					<span class="dot sa-2"><i class="title">Brazil</i></span>
					<span class="dot so-af-1"><i class="title">South Africa</i></span>
					<span class="dot aust"><i class="title">Australia</i></span>
					<span class="dot uk"><i class="title">UK</i></span>
					<span class="dot ger"><i class="title">Germany</i></span>
					<span class="dot swed"><i class="title">Sweden</i></span>
					<span class="dot russ"><i class="title">Russia</i></span>
					<span class="dot uae"><i class="title">uae</i></span>
					<span class="dot india"><i class="title">India</i></span>
					<span class="dot sing"><i class="title">Singapore</i></span>
					<span class="dot china"><i class="title">China</i></span>
					<span class="dot korea"><i class="title">Korea</i></span>
					<span class="dot japan"><i class="title">Japan</i></span>
				</div>
			</figure>
		</section>
</div>
 
<?php get_footer(); ?>