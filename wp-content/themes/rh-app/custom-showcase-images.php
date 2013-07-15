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
      <div class="page-nav-left"></div>
      <div class="image-gallery">
        <div class="gallery-inner"> 
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

             <?php 

              $args = array(
                  'post_type' => 'attachment',
                  'numberposts' => -1,
                  'post_status' => null,
                  'post_parent' => $post->ID,
                  'exclude' => get_post_thumbnail_id($post->ID)//Exclude featured image
                ); 
              ?>

            <?php 
              $attachments = get_posts( $args );
                if ( $attachments ) {
                  foreach ( $attachments as $attachment ) {
                    echo wp_get_attachment_image( $attachment->ID, 'full' );
                  }
                } 
            ?>

        </div> 
      </div>

      <div class="page-nav-right"></div>

      <div class="headline"><?php the_content(); ?></div>
      
      </article><?php echo "<!--"; ?>
      
    <?php endwhile; endif; ?>

    <?php echo "-->"; ?>
  </section>
</div>

<?php get_footer(); ?>
