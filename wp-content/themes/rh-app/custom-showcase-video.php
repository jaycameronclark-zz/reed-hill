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

        if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div class="showcase-video">
        <div class="video-inner"> 
          <video width="" height="" class="video-js vjs-default-skin" autoplay data-setup="{}">
            <source src="<?php echo wp_get_attachment_url( '860' ) ?>" type='video/mp4' />
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