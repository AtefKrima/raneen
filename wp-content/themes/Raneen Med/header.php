<!DOCTYPE HTML>
<?php global $theme;
global $data;
?>
<html <?php language_attributes(); ?> class="no-js" prefix="og: http://ogp.me/ns#">
    <head>
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>;charset=<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="author" content="Atef.Mohamed" />
        <meta <?php bloginfo('charset'); ?> >
        <meta name="description" content="<?php echo $theme->get_option('desc'); ?>" />
        <meta name="keywords" content="<?php echo $theme->get_option('seo'); ?>" />  
        <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
        <link rel="pingback" href="<?php bloginfo('pingback url'); ?>" />

        <title><?php bloginfo('name'); ?> | 
            <?php
            if (is_home()) {
                echo 'الرئيسية';
            } elseif (is_404()) {
                echo '404 Not Found';
            } elseif (is_category()) {
                echo wp_title('');
            } elseif (is_search()) {
                echo 'نتائج البحث';
            } elseif (is_day() || is_month() || is_year()) {
                echo wp_title('');
            } else {
                echo wp_title('');
            }
            ?>
        </title> 

        <link rel="stylesheet" href="<?php echo CSS; ?>/bootstrap-rtl.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo CSS; ?>/bootstrap-theme.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo CSS; ?>/owl.carousel.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo CSS; ?>/ihover.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo CSS; ?>/owl.theme.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo CSS; ?>/owl.transitions.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo CSS; ?>/font-awesome/css/font-awesome.min.css"/>
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />

        <script type="text/javascript" src="<?php echo JS; ?>/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="<?php echo JS; ?>/owl.carousel.js"></script>
        <script type="text/javascript" src="<?php echo JS; ?>/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo JS; ?>/custom.js"></script>
        
        <?php wp_head(); ?>
    </head>
    <body>

        <header>

            <section>
                <div class="Top-Head m-b-30">
                    <div class="container">

                        <div class="col-md-4  col-sm-7 col-xs-12">
                            <div class="Rf-b">

                                <div class="Contact pull-right">
                                    <span>Info@domain.com <i class="fa fa-envelope p-r-10"></i></span>
                                </div>





                                <div class="Phone">
                                    <span>966-052348324 <i class="fa fa-phone p-r-10"></i></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-5 col-xs-12 pull-left">
                            <div class="Rs-b">
                                <div class="Social-Bar">

                                    <span>تابعنا</span>

                                    <div class="social-icons">
                                        <ul>

                                            <li><a class="social social-googleplus" href="<?php echo $theme->get_option('googleplus'); ?>" target="_blank">

                                                    <div class="front">
                                                        <i class="fa fa-google-plus"></i>
                                                    </div>
                                                    <div class="back">
                                                        <i class="fa fa-google-plus"></i>
                                                    </div>
                                                </a>  
                                            </li>
                                            <li><a class="social social-twitter" href="<?php echo $theme->get_option('twitter'); ?>" target="_blank">
                                                    <div class="front">
                                                        <i class="fa fa-twitter"></i>
                                                    </div>
                                                    <div class="back">
                                                        <i class="fa fa-twitter"></i>
                                                    </div>
                                                </a></li>

                                            <li> <a class="social" href="<?php echo $theme->get_option('facebook'); ?>" target="_blank">
                                                    <div class="front">
                                                        <i class="fa fa-facebook"></i>

                                                    </div>
                                                    <div class="back">
                                                        <i class="fa fa-facebook"></i>

                                                    </div>
                                                </a></li>


                                        </ul>

                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>


            <section>
                <div class="container">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="logo">

                            <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"> <img  src="<?php echo IMAGES; ?>/logo.png" class="img-responsive"> </a>
                        </div>
                    </div>

                    <div class="col-md-8 col-sm-8 col-xs-12">

                        <nav class="navbar pull-left">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                            </div>
                            <div class="navbar-collapse collapse">
                                 <nav class="mainMenu">

<?php wp_nav_menu(array('theme_location' => 'main-menu', 'items_wrap' => '<ul class="nav navbar-nav drops" id="F-nav" data-image="' . IMAGES . '/droplistarrow.png">%3$s</ul>', 'container' => 'false')); ?>
                                 </nav>
                            </div>
                        </nav>

                    </div>
                </div>

            </section>
        </header>
        <!--End Footer-->
