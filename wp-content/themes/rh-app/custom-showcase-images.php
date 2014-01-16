<!-- ////////// Showcase Images /// -->
<?php
/*
Template Name: Showcase Images
*/
?>
<?php get_header(); ?>

<div class="grid--full">
  <section class="main-container" id="<?php the_ID();?>">
    <?php echo "<!--"; ?>

      <?php echo "-->"; ?><article class="grid__item one-whole rh-media hard--left position-relative">

      <div class="image-gallery">
        <div class="gallery-inner"> 
          <?php
            $pagelist = get_pages('sort_column=post_title&sort_order=asc');
            $pages = array();
            foreach ($pagelist as $page) {
               $pages[] += $page->ID;
            }

            $current = array_search(get_the_ID(), $pages);
            $prevID = $pages[$current-1];
            $nextID = $pages[$current+1];

            $website_url = get_post_meta($post->ID, 'website_url', true);
            $background = get_post_meta( $post->ID, '_bpp_background', true );
            $featured = get_post_thumbnail_id($post->ID);
          
            if ( have_posts() ) : while ( have_posts() ) : the_post(); 

              $args = array(
                  'post_type' => 'attachment',
                  'numberposts' => -1,
                  'post_status' => null,
                  'post_parent' => $post->ID,
                  'order' => 'ASC',
                  'exclude' => array($background, $featured)//Exclude featured and background
                ); 

            $attachments = get_posts( $args );
              if ( $attachments ) {
                foreach ( $attachments as $attachment ) {
                  echo wp_get_attachment_image( $attachment->ID, 'full' );
                }
              } 
          ?>

        </div> 
      </div>

      <div class="headline">
        <div class="grid__item two-eighths palm-one-whole">
        <nav class="pager push--one-tenth">
          <?php if (!empty($prevID)) { ?>
            <div class="page-left"><a href="<?php echo get_permalink($prevID); ?>" title="<?php echo get_the_title($prevID); ?>">Back<span class="arrow-left"></span></a></div>
          <?php } ?>
          <?php if (!empty($nextID)) { ?>
            <div class="page-right">
              <a href="<?php echo get_permalink($nextID); ?>" title="<?php echo get_the_title($nextID); ?>"><span class="arrow-right"></span>Next</a></div>
          <?php } ?>
        </nav>
        </div><!--
        --><div class="grid__item six-eighths">
          <?php the_content(); ?>
          <?php if ($website_url) { ?>
            <div class="website-url float--right pull--one-twelfth">
              <a class="" href="<?php echo $website_url; ?>" target="_blank"><span class="url-arrow"></span>View Full Site</a>
            </div>
          <?php } ?>
        </div>
      </div>
      
  </article><?php echo "<!--"; ?>
      
  <?php endwhile; endif; ?>

  <?php echo "-->"; ?>
  
  </section>
</div>

<?php get_footer(); ?>
