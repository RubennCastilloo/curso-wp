<?php get_header(); ?>

<div class="container p-5">
    <?php 
        if(have_posts()){
            while(have_posts()){
                the_post(); ?>
                <h1><?php the_title(); ?></h1>

                <?php the_content(); ?>
            <?php }
        }
    ?>
</div>

<?php get_footer(); ?>