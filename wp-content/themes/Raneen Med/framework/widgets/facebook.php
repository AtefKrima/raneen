<?php

global $theme;

$themater_facebook_defaults = array(
    'title' => 'جديدنا على الفيس بوك',
    'url' => 'http://www.facebook.com/platform',
    'width' => '298',
    'height' => '255',
    'colorscheme' => 'light',
    'show_faces' => 'true',
    'stream' => 'false',
    'header' => 'false',
    'border' => '#ffffff'
);

$theme->options['widgets_options']['facebook'] =  isset($theme->options['widgets_options']['facebook'])
    ? array_merge($themater_facebook_defaults, $theme->options['widgets_options']['facebook'])
    : $themater_facebook_defaults;
        
add_action('widgets_init', create_function('', 'return register_widget("ThematerFacebook");'));

class ThematerFacebook extends WP_Widget 
{
    function __construct() 
    { 
	 
        $widget_options = array('description' => __('فيس بوك لايك بوكس. تعرض معجبين صفحة الموقع على الفيس بوك وتمكنك من عرض منشورات صفحة الفيس بوك على موقعك.', 'themater') );
        $control_options = array( 'width' => 440);
		$this->WP_Widget('themater_facebook', '&raquo;شبكات -  بوكس الفيس بوك', $widget_options, $control_options);
    }

    function widget($args, $instance)
    {
        global $wpdb, $theme;
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $url = $instance['url'];
        $width = $instance['width'];
        $height = $instance['height'];
        $colorscheme = $instance['colorscheme'];
        $show_faces = $instance['show_faces'] == 'true' ? 'true' : 'false';
        $stream = $instance['stream'] == 'true' ? 'true' : 'false';
        $header = $instance['header'] == 'true' ? 'true' : 'false';
        $border = $instance['border'];
        ?>
        
            <div class="fans">
              <div class="ftop">
              	<?php if ( $title ) {  ?> <h2><?php echo $title; ?></h2> <?php } ?>
              </div>
              <div class="fend">
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) {return;}
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
            <div class="fb-like-box" data-href="<?php echo $url; ?>" data-width="<?php echo $width; ?>" data-height="<?php echo $height; ?>" data-colorscheme="<?php echo $colorscheme; ?>" data-show-faces="<?php echo $show_faces; ?>" data-stream="<?php echo $stream; ?>" data-header="<?php echo $header; ?>" data-border-color="<?php echo $border; ?>"></div>
            
            </div>
	      </div>
        
     <?php
    }

    function update($new_instance, $old_instance) 
    {		
    	$instance = $old_instance;
    	$instance['title'] = strip_tags($new_instance['title']);
        $instance['url'] = strip_tags($new_instance['url']);
        $instance['width'] = strip_tags($new_instance['width']);
        $instance['height'] = strip_tags($new_instance['height']);
        $instance['colorscheme'] = strip_tags($new_instance['colorscheme']);
        $instance['show_faces'] = strip_tags($new_instance['show_faces']);
        $instance['stream'] = strip_tags($new_instance['stream']);
        $instance['header'] = strip_tags($new_instance['header']);
        $instance['border'] = strip_tags($new_instance['border']);
        return $instance;
    }
    
    function form($instance) 
    {	
        global $theme;
		$instance = wp_parse_args( (array) $instance, $theme->options['widgets_options']['facebook'] );
        
        ?>
        
            <div class="tt-widget">
                <table width="100%">
                    <tr>
                        <td class="tt-widget-label" width="30%"><label for="<?php echo $this->get_field_id('title'); ?>">العنوان:</label></td>
                        <td class="tt-widget-content" width="70%"><input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" /></td>
                    </tr>
                    
                    <tr>
                        <td class="tt-widget-label"><label for="<?php echo $this->get_field_id('url'); ?>">رابط صفحة الفيس بوك:</label></td>
                        <td class="tt-widget-content"><input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo esc_attr($instance['url']); ?>" /></td>
                    </tr>
                    
                    <tr>
                        <td class="tt-widget-label">المساحة:</td>
                        <td class="tt-widget-content">
                            العرض: <input type="text" style="width: 50px;" name="<?php echo $this->get_field_name('width'); ?>" value="<?php echo esc_attr($instance['width']); ?>" /> بيكسل. &nbsp; &nbsp;
                            الارتفاع: <input type="text" style="width: 50px;" name="<?php echo $this->get_field_name('height'); ?>" value="<?php echo esc_attr($instance['height']); ?>" /> بيكسل.
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="tt-widget-label">لون البوكس:</td>
                        <td class="tt-widget-content">
                            <select name="<?php echo $this->get_field_name('colorscheme'); ?>">
                                <option value="light" <?php selected('alignleft', $instance['colorscheme']); ?> >مضئ</option>
                                <option value="dark"  <?php selected('alignright', $instance['colorscheme']); ?>>مظلم</option>
                             </select>      
                             &nbsp; &nbsp; لون الحدود: <input type="text" style="width: 50px;" name="<?php echo $this->get_field_name('border'); ?>" value="<?php echo esc_attr($instance['border']); ?>" /> <em>مثال: #ffffff</em>                      
                        </td>
                    </tr>

                    <tr>
                        <td class="tt-widget-label">خيارات:</td>
                        <td class="tt-widget-content">
                            <input type="checkbox" name="<?php echo $this->get_field_name('show_faces'); ?>"  <?php checked('true', $instance['show_faces']); ?> value="true" />  <?php _e('اظهار الوجوه', 'themater'); ?>
                            <br /><input type="checkbox" name="<?php echo $this->get_field_name('stream'); ?>"  <?php checked('true', $instance['stream']); ?> value="true" />  <?php _e('عرض المنشورات', 'themater'); ?>
                            <br /><input type="checkbox" name="<?php echo $this->get_field_name('header'); ?>"  <?php checked('true', $instance['header']); ?> value="true" />  <?php _e('اظهار الهيدر', 'themater'); ?>   
                        </td>
                    </tr>
                    
                </table>
            </div>
            
        <?php 
    }
} 
?>