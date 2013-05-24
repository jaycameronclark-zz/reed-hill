<?php
/*
Template Name: Client
*/
?>
<?php get_header(); ?>

<div class="grid--full">
		<section class="main-container" id="post-<?php the_ID(); ?>">
			<?php echo "<!--"; ?>
			<?php 
			  $args = array( 
			    'post_type' => 'rh_pt_client', 
			    'posts_per_page' => 8,  
			    'orderby' =>'date', 
			    'order' =>'ASC',
			      // 'tax_query' => array(
			      //   array(
			      //     'taxonomy' => 'features_category',
			      //     'field' => 'slug',
			      //     'terms' => 'main-home-page-features'
			      //   )
			      // )
			    );
			  $loop = new WP_Query( $args);
			  ;

			  while ( $loop->have_posts() ) : $loop->the_post(); ?>
				
				<?php echo "-->"; ?><a href="<?php the_permalink(); ?>"><article class="grid__item one-quarter palm-one-half tile">
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'client-thumb' ); } ?>
					<div class="title one-whole"><?php the_title(); ?></div>
				</article></a><?php echo "<!--"; ?>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
				<?php echo "-->"; ?>
		</section>
</div>


<?php get_footer(); ?>
