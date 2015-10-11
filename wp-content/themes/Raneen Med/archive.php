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


            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="Post_con">
                        <?php if (has_post_thumbnail()) { ?>
                            <?php the_post_thumbnail(); ?>


                        <?php } else { ?>
                            <img src="<?php echo IMAGES; ?>/m-slider.jpg"/>
                        <?php } ?>
                        <div class="col-md-12">
                            <div class="Post_titly"><h1><?php the_title(); ?></h1></div>
                            <div class="Post_ftxt"><p>   <?php the_content(); ?></p></div>

                            <div class="clearfix"></div>

                        </div>

                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <p class="msg" >عفواً ..!, لا توجد مقالات فى هذا التصنيف</p>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>