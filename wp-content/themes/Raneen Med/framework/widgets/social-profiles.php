<?php
    global $theme;
    
    $themater_social_profiles_defaults = array(
        'title' => 'الشبكات الاجتماعية',
        'profiles' => array(
            array('title' => 'Twitter', 'url' => 'http://twitter.com/', 'button' => get_template_directory_uri() . '/images/social-profiles/twitter.png'),
            array('title' => 'Facebook', 'url' => 'http://facebook.com/', 'button' => get_template_directory_uri() . '/images/social-profiles/facebook.png'),
            array('title' => 'Youtube', 'url' => 'https://youtube.com/', 'button' => get_template_directory_uri() . '/images/social-profiles/youtube.png'),         array('title' => 'RSSFeed', 'url' => $theme->rss_url(), 'button' => get_template_directory_uri() . '/images/social-profiles/rss.png')

        )
    );

    $theme->options['widgets_options']['socialprofiles'] = is_array($theme->options['widgets_options']['socialprofiles'])
    ? array_merge($themater_social_profiles_defaults, $theme->options['widgets_options']['socialprofiles'])
    : $themater_social_profiles_defaults;

// hide social widgets    
add_action('widgets_init', create_function('', 'return register_widget("ThematerSocialProfiles");'));
class ThematerSocialProfiles extends WP_Widget 
{
    function __construct() 
    {
        global $theme;
        
        $widget_options = array('description' => __('تظهر مواقع التواصل الاجتماعي', 'themater') );
        $control_options = array( 'width' => 480);
        parent::__construct('themater_social_profiles', '&raquo;شبكات - الشبكات الاجتماعيه', $widget_options, $control_options);
    }

    function widget($args, $instance)
    {
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $profiles = $instance['profiles'];
   
        if(is_array($profiles)) {
            ?>
           <!-- <div class="topsocial">-->
                <ul class="primary-menu">
                <?php  if ( $title ) {  ?> <h3 class="widgettitle"><?php echo $title; ?></h3><?php } 
                    foreach($profiles as $profile) {
                        ?>
                        <li class="social-profiles-widget">
                        <a class="<?php echo strip_tags($profile['title']); ?>" href="<?php echo strip_tags($profile['url']); ?>" target="_blank"></a></li>
						
						<?php
                    }
                ?>
                </ul>
           <!-- </div>-->   
            <?php
        }
    }

    function update($new_instance, $old_instance) 
    {				
    	$instance = $old_instance;
    	$instance['title'] = strip_tags($new_instance['title']);
        $instance['profiles'] = $new_instance['profiles'];
        return $instance;
    }
    
    function form($instance) 
    {	
        global $theme;
        $instance = wp_parse_args( (array) $instance, $theme->options['widgets_options']['socialprofiles'] );
        $get_profiles = $instance['profiles'];
        $get_this_id = preg_replace("/[^0-9]/", '', $this->get_field_id('this_id_profiles'));
        $this_id = !$get_this_id ? 'this_id_profiles___i__' : 'this_id_profiles_' . $get_this_id;
    ?>
    <div class="themater_social_profiles_widget">
        <div class="tt-widget themater_social_profiles_widget_title">
            <table width="100%">
                <tr>
                    <td class="tt-widget-label" width="25%"><label for="<?php echo $this->get_field_id('title'); ?>">العنوان:</label></td>
                    <td class="tt-widget-content" width="75%"><input class="tt-text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" /></td>
                </tr>
            </table>
        </div>
            
        <div style="margin-bottom: 20px;">
            <a class="button" onclick="themater_sp_new('<?php echo $this_id; ?>');" > اضافة جديد</a> &nbsp; &nbsp; 
        </div>
        <?php
            if(is_array($get_profiles)) {
                foreach($get_profiles as $sp_id=>$sp) {
                    ?>
                    <div id="sp_container_<?php echo $this_id . $sp_id; ?>" style="padding: 0 0 10px 0; border-bottom: 1px solid #ddd; margin-bottom: 10px;" >
                        <div class="tt-clearfix" style="background: #eee; border: 1px solid #ddd; border-left: 4px solid #ddd; padding: 4px 8px;">
                            <div style="float: left;"><span style="font-weight: bold;" id="sp_title_<?php echo $this_id . $sp_id; ?>"><?php echo $sp['title']; ?></span></div>
                            <div style="float: right;"><a class="tt-link" onclick="themater_togle('sp_edit_<?php echo $this_id . $sp_id; ?>');">تعديل</a> | <a class="tt-link" onclick="themater_sp_delete('<?php echo $this_id . $sp_id; ?>');">حذف</a></div>
                        </div>
                        
                        <div class="tt-hidden" id="sp_edit_<?php echo $this_id . $sp_id; ?>" style="background: #fff; padding: 10px; border: 1px solid #ddd; border-top: 0;">
                            
                            <div class="tt-widget">
                                <table width="100%">
                                    <tr>
                                        <td class="tt-widget-label" width="25%">العنوان:</td>
                                        <td class="tt-widget-content" width="75%">
                                            <input class="tt-text" id="sp_title_text_<?php echo $this_id . $sp_id; ?>" name="<?php echo $this->get_field_name('profiles'); ?>[<?php echo $sp_id; ?>][title]" type="text" value="<?php echo esc_attr($sp['title']); ?>" onkeyup="themater_sp_titles('<?php echo $this_id; ?>', '<?php echo $sp_id; ?>');" />
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="tt-widget-label" width="25%">الرابط:</td>
                                        <td class="tt-widget-content" width="75%">
                                            <input class="tt-text" name="<?php echo $this->get_field_name('profiles'); ?>[<?php echo $sp_id; ?>][url]" type="text" value="<?php echo esc_attr($sp['url']); ?>" />
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="tt-widget-label" width="25%">الصورة:</td>
                                        <td class="tt-widget-content" width="75%">
                                            <?php
                                                if($sp['button']) {
                                                    ?>
                                                    <img src="<?php echo $sp['../../lib/widgets/button']; ?>" /><br />
                                                    <?php
                                                }
                                            ?>
                                            <input class="tt-text" name="<?php echo $this->get_field_name('profiles'); ?>[<?php echo $sp_id; ?>][button]" type="text" value="<?php echo esc_attr($sp['button']); ?>" />
                                        </td>
                                    </tr>
                                    
                                    
                                </table>
                            </div>
                            
                            
                        </div>
                    </div>
                    <?php
                }
            }
        
        ?>
        
            <div id="themater_sp_new_<?php echo $this_id; ?>" style="display: none;">
                    
                <div id="sp_container_the__id__" style="padding: 0 0 10px 0; border-bottom: 1px solid #ddd; margin-bottom: 10px;" >
                    <div class="tt-clearfix" style="background: #eee; border: 1px solid #ddd; border-left: 4px solid #ddd; padding: 4px 8px;">
                        <div style="float: left;"><span style="font-weight: bold;" id="sp_title_the__id__">اضافة جديد</span></div>
                        <div style="float: right;"><a class="tt-link" onclick="themater_togle('sp_edit_the__id__');">تعديل</a> | <a class="tt-link" onclick="themater_sp_delete('the__id__');">حذف</a></div>
                    </div>
                    
                    <div id="sp_edit_the__id__" style="background: #fff; padding: 10px; border: 1px solid #ddd; border-top: 0;">
                        
                        <div class="tt-widget">
                            <table width="100%">
                                <tr>
                                    <td class="tt-widget-label" width="25%">العنوان:</td>
                                    <td class="tt-widget-content" width="75%">
                                        <input class="tt-text" id="sp_title_text_the__id__" name="name_replace_<?php echo $this->get_field_name('profiles'); ?>[the__id__][title]" type="text" value="New Profile" onkeyup="themater_sp_titles('<?php echo $this_id; ?>', 'new__id__');" />
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="tt-widget-label" width="25%">الرابط:</td>
                                    <td class="tt-widget-content" width="75%">
                                        <input class="tt-text" name="name_replace_<?php echo $this->get_field_name('profiles'); ?>[the__id__][url]" type="text" value="" />
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="tt-widget-label" width="25%">الصورة:</td>
                                    <td class="tt-widget-content" width="75%">
                                        <input class="tt-text" name="name_replace_<?php echo $this->get_field_name('profiles'); ?>[the__id__][button]" type="text" value="" />
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <?php
    }
} 
?>