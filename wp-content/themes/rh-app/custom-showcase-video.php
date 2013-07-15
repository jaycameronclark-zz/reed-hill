<!-- ////////// Showcase Images /// -->
<?php
/*
Template Name: Showcase Video
*/
?>
<?php get_header(); ?>

<div class="grid--full">
  <section class="main-container" id="<?php the_ID();?>">
    <?php echo "<!--"; ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <?php echo "-->"; ?><article class="grid__item one-whole rh-media hard--left">
      <div class="showcase-video">
        <div class="video-inner"> 
          <video width="" height="" class="video-js vjs-default-skin" autoplay data-setup="{}">
            <source src="<?php echo wp_get_attachment_url( '860' ) ?>" type='video/mp4' />
          </video>
        </div>
      </div>
      <div class="headline"><?php the_content(); ?></div>

        <div class="pager-nav"></div>
 
      </article><?php echo "<!--"; ?>
      
    <?php endwhile; endif; ?>

    <?php echo "-->"; ?>
  </section>
</div>

<?php get_footer(); ?>