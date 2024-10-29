<?php get_header(); ?>

<div class="container p-5">
    <?php 
        if(have_posts()){
            while(have_posts()){
                the_post(); ?>
                <h1><?php the_title(); ?></h1>
               <div class="row">
                <div class="col-md-6">
                    <?php the_post_thumbnail('large'); ?>
                </div>
                <div class="col-md-6">
                    <?php the_content(); ?>
                </div>
               </div>
            <?php }
        }
    ?>
</div>

<?php get_footer(); ?>