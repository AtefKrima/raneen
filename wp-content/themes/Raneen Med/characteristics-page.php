<? /*Template Name: صفحة مميزات*/ ?>
<?php get_header(); ?>

<div class="Gal_titly">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="chary-img">
                <img src="<?php echo IMAGES; ?>/factors.jpg"/>
            </div>

            <div class="About-post">

                <ul>
                    <?php query_posts("showposts=10 &cat=42");
                    if (have_posts()) : while (have_posts()) : the_post();
                            ?>                 

                            <li> <?php the_content(); ?> </li>
                            <?php
                        endwhile;
                    endif;
                    wp_reset_query();
                    ?>

                </ul>


            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>