<?php get_header(); ?>

<!--starting the body the slider-->

<section>



    <div id="Mslider" class="owl-carousel owl-theme">

        <?php
        $ms = $theme->get_option('Mainblock');
        if ($ms != '') {


            query_posts("showposts=10 &cat=" . $theme->get_option("Mainblock"));
        } else {
            query_posts("showposts=10");
        }
        ?>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <div class="item">  
                    <div class="Scontents">
                        <h1><?php the_title(); ?></h1>
                        <p><?php echo limit_words(get_the_excerpt(), '18') . '...'; ?></p>
                        <a href="<?php the_permalink(); ?>">اعرف المزيد</a>
                    </div>
                    <?php the_post_thumbnail(); ?>


                </div>
                <?php
            endwhile;
        endif;
        wp_reset_query();
        ?>



    </div>

    <!--starting Contact block -->
    <div class="Confirm-Block">
        <div class="container">
            <div class="col-md-6 col-sm-4 col-xs-12">
                <span class="pull-right"></span><p>احجز موعدك الان بكل سهولة</p>
            </div>
            <div class="col-md-6 col-sm-8 col-xs-12">
                <a href="اتصل بنا" class="Reserve">احجز الآن</a>

                <div class="Call">
                    <img src="<?php echo IMAGES; ?>/mobile.png" class="img-responsive pull-right"/>
                    <hgroup>
                        <h6>احجز من خلال الهاتف </h6>
                        <h2>4336 640 1 966+</h2>
                    </hgroup>
                </div>
            </div>
        </div>

    </div>

</section>


<!--starting info block -->


<section class="info-block">

    <div class="container">
        <div class="col-md-4">
            <div class="About">
                <span>كلمة عن</span><br/>
                <h1><span class="B-Clr">مستشفى</span> رنين الطبى</h1>

                <p>

                    <?php echo $theme->get_option('About'); ?>

                </p>
                <a href="عن المستشفى" class="R-more"><i class="fa fa-plus"></i> اقرأ المزيد </a>
            </div>
        </div>

        <div class="col-md-8">
            <img src="<?php echo IMAGES; ?>/factors.jpg" class="img-responsive pull-left p-r-20"/>    
            <div class="About">

                <h1> مميزات المستشفى</h1>
                
                <ul>
                <?php           
                query_posts("showposts=4 &cat=42");
                
                     if (have_posts()) : while (have_posts()) : the_post(); ?>
                    
                    <li><i class="fa fa-long-arrow-left"></i> <?php echo limit_words(get_the_excerpt(), '8') . '...'; ?> </li>
                <?php
            endwhile;
        endif;
        wp_reset_query();
        ?>
                </ul>

                <a href="مميزات" class="R-more"><i class="fa fa-plus"></i> اقرأ المزيد </a>
            </div>

        </div>
    </div>

</section>


<!--starting Services block -->




<!--              <div class="container">
                  <div class="Services About m-30 no-border">
                       <h1> خدمات <span class="B-Clr">المستشفى</span></h1>
                  </div>

              
                  <div class="col-md-3">
               
                          
                              <div class="serv-con bg1">
                                 
                                  <div class="serBlock-img">
                                      <img src="<?php echo IMAGES; ?>/b1-img.png" class="img-responsive">

                                  </div>

                                  <h3>اسم الخدمة الاولى</h3>
                                  <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز </p>
                               

                              </div>
                              
                              
                        
                 
                  </div>
            
           <div class="col-md-3">
                               <div class="serv-con bg2">
                                  <div class="serBlock-img">
                                      <img src="<?php echo IMAGES; ?>/b2-img.png" class="img-responsive">

                                  </div>

                                  <h3>اسم الخدمة الاولى</h3>
                                  <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز </p>
                              

                              </div>
                  </div>
                  
                  
             <div class="col-md-3">
                               <div class="serv-con bg3">
                                  <div class="serBlock-img">
                                      <img src="<?php echo IMAGES; ?>/b3-img.png" class="img-responsive">

                                  </div>

                                  <h3>اسم الخدمة الاولى</h3>
                                  <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز </p>
                              

                              </div>
                  </div>
                  
               <div class="col-md-3">
                             <div class="serv-con bg4">
                                  <div class="serBlock-img">
                                      <img src="<?php echo IMAGES; ?>/b4-img.png" class="img-responsive">

                                  </div>

                                  <h3>اسم الخدمة الاولى</h3>
                                  <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز </p>
                              

                              </div>
                  </div>


                  <div class="clearfix"></div>
                  <div class="More-btn m-t-15"> 
                
                  </div>
              </div>-->
<section>   
    <div class="container">
        <div class="Services About m-30 no-border">
            <h1> خدمات <span class="B-Clr">المستشفى</span></h1>
        </div>
        <ul class="stage">
            
                    <?php query_posts("showposts=4 &cat=43");
                    if (have_posts()) : while (have_posts()) : the_post();
                            ?>  
            
            <li class="scene">

                <div class="movie">
                    <div class="poster"></div>
                    <div class="info">
                        <header>
                            <h1><?php the_title(); ?></h1>

                        </header>
                        <p><?php echo limit_words(get_the_excerpt(), '30') . '...'; ?> </p>
                    </div>
                </div>

            </li>
                       <?php
                        endwhile;
                    endif;
                    wp_reset_query();
                    ?>





        </ul> 
    </div>
    <div class="More-btn m-t-15"> 
        <a href="خدماتنا" class="Reserve text-center"> باقى الخدمات</a>
    </div>
</section>


<!--Map section-->
<section class="m-t-40">

    <figure>
        <div class="Go_map">
            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="100%" height="443" src="https://maps.google.com/maps?hl=en&q=King Abdul Aziz, Riyad, Riyadh Province, Saudi Arabia&ie=UTF8&t=roadmap&z=7&iwloc=B&output=embed"><div><small><a href="http://embedgooglemaps.com">embedgooglemaps.com</a></small></div><div><small><a href="http://www.premiumlinkgenerator.com/">free link generators on premiumlinkgenerator.com</a></small></div></iframe>
        </div>

    </figure> 


</section>



<?php get_footer(); 


