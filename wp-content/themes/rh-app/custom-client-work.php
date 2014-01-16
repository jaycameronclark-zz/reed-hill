<!-- ////////// Client Landing /// -->
<?php
/*
Template Name: Client Landing
*/
?>
<?php get_header(); ?>

<div class="grid--full">
  <section class="main-container min-height" id="<?php the_ID();?>">
<?php echo "<!--"; ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php $args = array(
  'sort_order' => 'ASC',
  'sort_column' => 'post_title',
  'hierarchical' => 0,
  'exclude' => '',
  'include' => '',
  'meta_key' => '',
  'meta_value' => '',
  'authors' => '',
  'child_of' => 0,
  'parent' => $post->ID,
  'exclude_tree' => '',
  'number' => '',
  'offset' => 0,
  'post_type' => 'page',
  'post_status' => 'publish'
); 

  $subpages = get_pages($args);

  foreach( $subpages as $page ) {    
    $content = $page->post_content;

    $content = apply_filters( 'the_content', $content );

  ?>
    <?php echo "-->"; ?><a href="<?php echo get_page_link( $page->ID ); ?>"><article class="grid__item one-quarter palm-one-half tile">
    <?php echo get_the_post_thumbnail($page->ID, 'client-thumb'); ?> 
    <div class="title one-whole"><span><?php echo $page->post_title; ?></span></div>
    </article></a><?php echo "<!--"; ?>
  <?php } ?>

<?php endwhile; ?>
<?php endif; ?>
<?php echo "-->"; ?>
  </section>
</div>



<?php get_footer(); ?>
