<? /*Template Name: صفحةمنتجاتنا*/ ?>
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
        
            <ul class="stage m-t-30">
                
            
       <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
       $args= array(
	'cat' => 44,
	'paged' => $paged
);         ?>
                    <?php query_posts($args);
                    if (have_posts()) : while (have_posts()) : the_post();
                            ?>  
                <div class="col-md-4">
                    
                    <a href="<?php the_permalink(); ?>"> <li class="servy">

                <div class="movie">
                    <div class="poster"><?php the_post_thumbnail(); ?></div>
                    <div class="info">
                        <header>
                            <h1><?php the_title(); ?></h1>

                        </header>
                        <p><?php echo limit_words(get_the_excerpt(), '30') . '...'; ?> </p>
                    </div>
                </div>

                        </li></a>
                </div>

                
                
                <?php endwhile; ?>
	<!-- end of the loop -->

	<!-- pagination here -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pagi">
                    <?php if(function_exists('sh_pagination')) : ?>
          <?php sh_pagination() ?>
          <?php else : ?>
          <div class="alignleft">
            <?php previous_posts_link(__('التدوينات الحديثة ','arclite')) ?>
          </div>
          <div class="alignright">
            <?php next_posts_link(__(' التدوينات السابقة','arclite')) ?>
          </div>
          <div class="clear"></div>
          <?php endif; ?>
        
    </div>
                </div>
            </div>
        </div>
          

	<?php wp_reset_postdata(); ?>

<?php else : ?>
        <p class="alert-danger m-20"><?php _e( 'لا يوجد تدوينات' ); ?></p>
<?php endif; ?>
                
                
                
                
  
                   
                   
         </ul>


        
    </div>
</div>




<?php
get_footer();
