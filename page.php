<?php get_header(); ?>
  <div class='jumbotron'>
    <div class="container page">
      <div class="row">

          <?php   if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="col-md-7">
                      <h1><?php the_title(); ?> </h1>
        </div>
          <div class = 'page-header'>

            <img class="medium_logo" src="../images/logo3.png">
          </div> <!-- end page header -->
          <?php the_content(); ?>
          <?php endwhile; else: ?>
          <p>content not yet added.</p>
          <?php endif; ?>
      </div><!-- end row -->
    </div> <!-- /container -->
    <a href='https://www.facebook.com/zeigtucker/'><img class='social'src="../images/social.png" alt='facebook link'><p class='follow'>follow Zeig, Tucker &#38; Theisen on Facebook</p>
        </a>
  </div> <!-- end jumbotron -->
<?php get_footer(); ?>

     