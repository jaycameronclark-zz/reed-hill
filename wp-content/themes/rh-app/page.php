<!-- ////////// page.php /// -->
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
      <figure class="grid__item one-whole palm-one-whole offices">
        <div class="map-grid">
          <div class="grid__item one-whole palm-one-whole">
          <article class="content soft one-whole">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <span class="arrow"></span><?php the_content(); ?>
            <?php endwhile; ?>
            <?php endif; ?>
          </article>
          </div>
          <?php echo get_the_post_thumbnail($page->ID, 'inner-background'); ?>
        </div>
      </figure>
    </section>
</div>


<?php get_footer(); ?>
