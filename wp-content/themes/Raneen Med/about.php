<? /*Template Name: صفحة عن المستشفى*/ ?>
<?php get_header(); ?>

﻿<?php global $theme;
global $data; ?>
<div class="Gal_titly">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h1>عن المستشفى</h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">  
        <div class="col-md-4">

            <!-- colored -->
            <div class="about-logo">
                <div class="ih-item circle colored effect3 top_to_bottom"><a href="#">
                        <div class="img"><img src="<?php echo IMAGES; ?>/r-hospital.jpg" alt="img"></div>
                        <div class="info">
                            <h3>مستشفى رنين</h3>
                            <p>هى الاختيار الافضل </p>
                        </div></a></div>
                <!-- end colored -->

            </div>
        </div>

        <div class="col-md-8">
            <div class="f_about">
                <div class="fabout_txt">
                    <p>

                      <?php echo $theme->get_option('About'); ?>

                    </p>
                    <div class="More-btn">

                        <a class="Reserve text-center" href="../اتصل بنا"> اتصل بنا</a>
                    </div>


                </div>



            </div>

        </div>

    </div>
</div> 

<?php
get_footer();
