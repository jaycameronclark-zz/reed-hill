<!-- ////////// Showcase Video /// -->
<?php
/*
Template Name: Showcase Video
*/
?>
<?php get_header(); ?>


<div class="grid--full">
  <section class="main-container" id="<?php the_ID();?>">
    <?php echo "<!--"; ?>
    <?php echo "-->"; ?><article class="grid__item one-whole rh-media hard--left">
    
      <?php
        $pagelist = get_pages('sort_column=post_title&sort_order=asc');
        $pages = array();
        foreach ($pagelist as $page) {
           $pages[] += $page->ID;
        }

        $current = array_search(get_the_ID(), $pages);
        $prevID = $pages[$current-1];
        $nextID = $pages[$current+1];

        if (have_posts()) : while (have_posts()) : the_post(); 

          $args = array(
              'post_type' => 'attachment',
              'numberposts' => -1,
              'post_mime_type' => 'video',
              'post_status' => null,
              'post_parent' => $post->ID,
              'order' => 'ASC',
            ); 


          $attachments = get_posts( $args ); 
          $filetype = "";

          ?>


      <div class="showcase-video">
        <div class="video-inner"> 
          <video width="" height="" class="video-js vjs-default-skin" autoplay data-setup="{}">
            <?php if ( $attachments ) { ?>
              <?php foreach ( $attachments as $attachment ) { ?>

              <?php 

                $attachment_mime = wp_check_filetype(wp_get_attachment_url($attachment->ID) );

                if ( $attachment_mime['type'] == 'video/mp4') { 
                    $filetype = 'video/mp4';
                }
                elseif( $attachment_mime['type'] == 'video/webm') {
                    $filetype = 'video/webm';
                }
                elseif( $attachment_mime['type'] == 'video/ogg'){
                  $filetype = 'video/ogg';
                }
                else{
                  $filetype = "";
                }
              ?>

              <source src="<?php echo wp_get_attachment_url( $attachment->ID ); ?>" type='<?php echo $filetype; ?>' />

             <?php } ?>
            <?php } ?>
          </video>
        </div>
      </div>

      <div class="headline">
        <div class="grid__item two-eighths">
        <nav class="pager push--three-twelfths">
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
        </div>
      </div>
 
      </article><?php echo "<!--"; ?>
      
    <?php endwhile; endif; ?>

    <?php echo "-->"; ?>
  </section>
</div>

<?php get_footer(); ?>