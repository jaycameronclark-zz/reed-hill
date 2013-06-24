<?php get_header(); ?>

<div class="grid--full">
  <section class="main-container min-height" >
<?php echo "<!--"; ?>

<?php
// Connected Posts
$connected = new WP_Query( array(
	'orderby'=> 'title',
	'order' => 'asc',
  'connected_type' => 'posts_to_pages',
  'connected_items' => get_queried_object(),
  'nopaging' => true,
) ); ?>

<?php if ( $connected->have_posts() ) : ?>

<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
  <?php echo "-->"; ?><a href="<?php echo get_page_link( $page->ID ); ?>"><article class="grid__item one-quarter palm-one-half tile">
  <?php echo get_the_post_thumbnail($page->ID, 'client-thumb'); ?>
  <div class="title one-whole"><?php echo the_title(); ?></div>
  </article></a><?php echo "<!--"; ?>
<?php endwhile; ?>

<?php wp_reset_postdata(); ?>

<?php endif; ?>

<?php echo "-->"; ?>
  </section>
</div>


<?php get_footer(); ?>
