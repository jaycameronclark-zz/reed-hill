<!-- ////////// People /// -->
<?php
/*
Template Name: People
*/
?>
<?php get_header(); ?>

<script>
  $(function(){

    $(".contact-modal").click(function(){
      $("#contact-modal").modal("show");
    });

  });
</script>

<div class="grid--full">
    <section class="main-container" id="post-<?php the_ID(); ?>">
      <figure class="grid__item one-whole palm-one-whole offices rh-media">
        <div class="map-grid">
          <div class="grid__item one-whole palm-one-whole">
          <article class="content soft">

            <?php
            $pagelist = get_pages('sort_column=post_title&sort_order=asc');
            $pages = array();
            foreach ($pagelist as $page) {
               $pages[] += $page->ID;
            }

            $current = array_search(get_the_ID(), $pages);
            $prevID = $pages[$current-1];
            $nextID = $pages[$current+1];
            ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

              <div class="people-title">
                <h3><span class="bio-arrow"></span><?php the_title(); ?></h3>
              </div>
              <div class="people-bio">
                <?php the_content(); ?>
              </div>

            <?php endwhile; ?>
            <?php endif; ?>
          </article>
          </div>
          <?php echo get_the_post_thumbnail($page->ID, 'inner-background'); ?>
        </div>

      <div class="headline">
        <div class="grid__item two-eighths bar-padding">
        </div>
        <div class="grid__item two-eighths">
        <nav class="pager push--one-tenth">
          <?php if (!empty($prevID)) { ?>
            <div class="page-left"><a href="<?php echo get_permalink($prevID); ?>" title="<?php echo get_the_title($prevID); ?>">Previous<span class="arrow-left"></span></a></div>
          <?php } ?>
          <?php if (!empty($nextID)) { ?>
            <div class="page-right">
              <a href="<?php echo get_permalink($nextID); ?>" title="<?php echo get_the_title($nextID); ?>"><span class="arrow-right"></span>Next Person</a></div>
          <?php } ?>
        </nav>
        </div><!--
        --><div class="grid__item three-eighths">
          <?php the_excerpt(); ?>
        </div>
      </div>
      </figure>
    </section>
</div>



<?php get_footer(); ?>
