<?php get_header(); ?>
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
        </div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
        <?php endwhile; endif; ?>
      </div> <!-- end row -->
    </div><!-- end container-fluid -->
<?php get_footer(); ?>

     