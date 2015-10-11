<?php
global $theme;
global $data;
?>
<footer>

            <div class="f-bg p-25">
                
           <div class="socials m-b-15">
            <ul>
              <li><a href="<?php echo $theme->get_option('facebook'); ?>"  class="fb" target="_blank"></a></li>
              <li><a href="<?php echo $theme->get_option('twitter'); ?>" class="tw" target="_blank"></a></li>
              <li><a href="<?php echo $theme->get_option('googleplus'); ?>" class="gb" target="_blank"></a></li>
            
            </ul>
          </div>
                <div class="clearfix"></div>   
                
                <p class="text-center">جميع الحقوق محفوظة لموقع مستشفى رنين </p>
                <span class="text-center">تصميم وتطوير شركة <a href="http://www.toegy.net/" target="_blank">تو ايجي</a></span>
            </div>
       
    <?php wp_footer(); ?>

        </footer>



    </body>
</html>