<?php

/**
 * Setting the default admin theme options and menus
 */
/* * *******************************************
 * Index Options
 * ********************************************
 */

function get_categories_array($show_count = false, $categories_array = array(), $query = 'hide_empty=0') {
    $categories = get_categories($query);

    foreach ($categories as $cat) {
        if (!$show_count) {
            $count_num = '';
        } else {
            switch ($cat->category_count) {
                case 0:
                    $count_num = " ( لا يوجد! )";
                    break;
                case 1:
                    $count_num = " ( 1 تدوينة )";
                    break;
                default:
                    $count_num = " ( $cat->category_count تدوينة )";
            }
        }
        $categories_array[$cat->cat_ID] = $cat->cat_name . $count_num;
    }
    return $categories_array;
}

/* * ************************************************************* */



$this->admin_option('اعدادات الرئيسية', 'من فضلك ادخل رقم التليفون', 'phone', 'text', '', array('display' => 'inline'));
$this->admin_option('اعدادات الرئيسية', 'من فضلك ادخل العنوان الخاص بالمستشفى', 'adress', 'textarea', '', array('display' => 'inline'));
$this->admin_option('اعدادات الرئيسية', 'اكتب وصف الموقع', 'desc', 'textarea', '', array('display' => 'inline'));
$this->admin_option('اعدادات الرئيسية', 'الكلمات الدالة على الموقع للاستخدام فى محركات البحث', 'seo', 'textarea', '', array('display' => 'inline'));

$this->admin_option('اعدادات الرئيسية', 'معلومات عن المستشفى', 'About', 'textarea', '', array('display' => 'inline'));



/* * *******************************************
 * ********************Slider************************
 */

$this->admin_option('عارض الشرائح', 'سلايدر الرئيسى', '_Mainblock', 'content', ''
);

$this->admin_option('عارض الشرائح', 'اختر القسم بالعربية', 'Mainblock', 'select', '', array('display' => 'inline', 'options' => get_categories_array(true, array('' => 'اختار القسم')))
);


/* * *******************************************
 * ********************************************
 */
/* * ****************** */
$this->admin_option('الصفحات الاجتماعية', 'الصفحات الاجتماعية ', '_socials', 'content', ''
);
$this->admin_option('الصفحات الاجتماعية', 'facebook', 'facebook', 'text', '#', array('display' => 'inline')
);
$this->admin_option('الصفحات الاجتماعية', 'twitter', 'twitter', 'text', '#', array('display' => 'inline')
);

$this->admin_option('الصفحات الاجتماعية', 'googleplus', 'googleplus', 'text', '#', array('display' => 'inline')
);

$this->admin_option('الصفحات الاجتماعية', 'youtube', 'youtube', 'text', '#', array('display' => 'inline')
);



/* * ********************* */



/* * *******************************************
 * Reset Options
 * ********************************************
 */
$this->admin_option('اعادة الضبط', 'العودة الى القيم الابتدائية للقالب', 'reset_options', 'content', '
        <div id="fp_reset_options" style="margin-bottom:40px; display:none;"></div>
        <div style="margin-bottom:40px;"><a class="button-primary tt-button-red" onclick="if (confirm(\'جميع الاعدادات السابقة سوف تقفد للابد!هل تريد اكمال ذلك؟\')) { themater_form(\'admin_options&do=reset\', \'fpForm\',\'fp_reset_options\',\'true\'); } return false;">الاعادة الأن</a></div>', array('help' => 'اعادة قيم القالب الى قيمه الابتدائية <span style="color:red;"><strong>ملاحظة:</strong>جميع الاعدادات السابقة سوف تفقد للابد!</span>', 'display' => 'extended-top')
);
/* * *******************************************
 * About Page
 * ********************************************
 */
/*





 */

function amr_theme() {

    $theme_data = get_theme_data(TEMPLATEPATH . '/style.css');
    return $theme_data['Title'] . "&nbsp;" . $theme_data['Version'];
}

$this->admin_option('عن القالب', 'عن قالب تو ايجى', 'reset_options', 'content', '
		<div class="admin_logo">
		
		
		
		<div id="singletmeta2">
          <ul>
            <li class="PMCat2"> نسخة القالب : تو ايجى 
			
			
			
			' . amr_theme() . '
            
			
			
			
			
            </li>
            <li class="PMDate2"> تصميم وبرمجة : <a href="http://www.nasj.com" target="_new">تو ايجى</a> للتصميم والبرمجة وتكنولوجيا المعلومات
 
            </li>
            <li class="PMauthor2">التواصل الهاتفى : المبيعات 00201004055888 			

            </li>
            <li class="PMvisits2"> المزيد من الاعمال : <a href="http://www.nasj.com/des_customers.html" target="_new">إضغط هنا</a>
            </li>
          </ul>
        </div>
		
		
		
		
		</div>
		
		<div class="contents_nasj">
		<br />
<div class="tt-form-label">- محتويات القالب -</div>	
			<br />
<div class="tt-form-label">- بالنسبة لعارض الصور -</div>

* يمكن تفعيل او تعطيل عارض الشرائح داخل الموقع .<br />

* كما يمكن التحكم فى مصدر البيانات المعروضة وعددها <br />

  حيث يمكن اختيار تصنيف معين ليكوم المصدر لهذه العروض او اختيار صفحات معينة
<br /><br />

<div class="tt-form-label">- اما بالنسبة لمواقع التواصل الاجتماعى والتو ايجى الاجتماعية -</div>

* فيمكن التحكم فى رابط ايقونات التواصل الاجتماعى <br />

* كما يمكن اظهار او اخفاء ايقونات معينة .<br />

* ويمكن ايضا اضافى اى عدد مراد عرضه من الايقونات بخلاف الموجودة مسبقا <br />

* ويمكن تغير صورة الايقونات فى اى وقت بالحجم الموجود مسبقاً.

<br /><br />
<div class="tt-form-label">- اعدادات الصفحة الرئيسية -</div>

* تتميز هذه الاعدادات بالتحكم الكامل فى محتوى الواجهة الرئيسية <br />

* حيث يمكن التحكم فى عدد البلوكات الظاهرة بالصفحة الرئيسية<br />

* التحكم فى مصدر عرض البلوكات<br />

* التحكم فى العدد الظاهر داخل كل بلوك<br />

<br />
<div class="tt-form-label">- الاعلانات -</div>

* يمكنك تفعيل او تعطيل الاعلانات داخل موقعك بالعدد الموجود فى التصميم<br />

  كما يمكنك التحكم الكامل فى صور الاعلانات وروابطها وفقراتها التعريفية .<br />

* ويمكن ايضا التحكم فى اكواد اعلانات جووجل ادسنس بالعدد المطلوب فى التصميم<br />

  كما يمكن تفعيلها او تعطيلها فى اى وقت .
<br /><br />
<div class="tt-form-label">- النصوص التعريفية -</div>

* يمكن ادراة محتوى النصوص التعريفية بالكامل داخل موقعك كما يمكن تعديل عناوين هذه النصوص<br />

  بالشكل المراد .
<br /><br />
<div class="tt-form-label">- بالنسبة لواجهات الشات -</div>

* تتيح لك قوالبنا الخاصة بواجهات الشات التحكم الكامل بأكواد الشات<br />

* ويمكن التحكم فى المنافذ الاعلانية لهذه الواجهات تحكم كامل .

			
		</div>
		
		
		
		
		
		
		
		
		
		
		'
);
/* * *******************************************
 * FUNCTIONS
 * ********************************************
 */

function themater_logo_source() {
    global $theme;
    $get_logo_source = $theme->get_option('themater_logo_source');
    $logo_sources = array('image' => 'أدسنس', 'text' => 'صورة الإعلان');

    foreach ($logo_sources as $key => $val) {
        $logo_source_selected = $get_logo_source == $key ? 'checked="checked"' : '';
        ?>

        <div id="select_logo_source_<?php echo $key; ?>" class="tt_radio_button_container">
            <input type="radio" name="themater_logo_source" value="<?php echo $key; ?>" <?php echo $logo_source_selected; ?> id="logo_source_id_<?php echo $key; ?>" />
            <a href="javascript:themater_logo_source_js('<?php echo $key; ?>');" class="tt_radio_button"><?php echo $val; ?></a> </div>
        <?php
    }
    ?>
    <script type="text/javascript">
        function themater_logo_source_js(source)
        {
            $thematerjQ("#themater_logo_image").hide();
            $thematerjQ("#select_logo_source_image a").removeClass('tt_radio_button_current');
            $thematerjQ("#select_logo_source_image").find(":radio").removeAttr("checked");

            $thematerjQ("#themater_logo_text").hide();
            $thematerjQ("#select_logo_source_text a").removeClass('tt_radio_button_current');
            $thematerjQ("#select_logo_source_text").find(":radio").removeAttr("checked");


            $thematerjQ("#themater_logo_" + source + "").fadeIn();
            $thematerjQ("#select_logo_source_" + source + " a").addClass('tt_radio_button_current');
            $thematerjQ("#select_logo_source_" + source + "").find(":radio").attr("checked", "checked");
        }
        jQuery(document).ready(function () {
            themater_logo_source_js('<?php echo $get_logo_source; ?>');
        });

    </script>
    <?php
}

/* * ************************************** */

function themater_logo_source2() {
    global $theme;
    $get_logo_source2 = $theme->get_option('themater_logo_source2');
    $logo_sources2 = array('image' => 'أدسنس', 'text' => 'صورة الإعلان');

    foreach ($logo_sources2 as $key2 => $val2) {
        $logo_source_selected2 = $get_logo_source2 == $key2 ? 'checked="checked"' : '';
        ?>

        <div id="select_logo_source_<?php echo $key2; ?>2" class="tt_radio_button_container">
            <input type="radio" name="themater_logo_source2" value="<?php echo $key2; ?>" <?php echo $logo_source_selected2; ?> id="logo_source_id_<?php echo $key2; ?>2" />
            <a href="javascript:themater_logo_source_js2('<?php echo $key2; ?>');" class="tt_radio_button"><?php echo $val2; ?></a> </div>
        <?php
    }
    ?>
    <script type="text/javascript">
        function themater_logo_source_js2(source)
        {
            $thematerjQ("#themater_logo_image2").hide();
            $thematerjQ("#select_logo_source_image2 a").removeClass('tt_radio_button_current');
            $thematerjQ("#select_logo_source_image2").find(":radio").removeAttr("checked");

            $thematerjQ("#themater_logo_text2").hide();
            $thematerjQ("#select_logo_source_text2 a").removeClass('tt_radio_button_current');
            $thematerjQ("#select_logo_source_text2").find(":radio").removeAttr("checked");


            $thematerjQ("#themater_logo_" + source + "2").fadeIn();
            $thematerjQ("#select_logo_source_" + source + "2 a").addClass('tt_radio_button_current');
            $thematerjQ("#select_logo_source_" + source + "2").find(":radio").attr("checked", "checked");
        }
        jQuery(document).ready(function () {
            themater_logo_source_js2('<?php echo $get_logo_source2; ?>');
        });

    </script>
    <?php
}

/* * ********************** */

function themater_logo_source3() {
    global $theme;
    $get_logo_source3 = $theme->get_option('themater_logo_source3');
    $logo_sources3 = array('image' => 'أدسنس', 'text' => 'صورة الإعلان');

    foreach ($logo_sources3 as $key3 => $val3) {
        $logo_source_selected3 = $get_logo_source3 == $key3 ? 'checked="checked"' : '';
        ?>

        <div id="select_logo_source_<?php echo $key3; ?>3" class="tt_radio_button_container">
            <input type="radio" name="themater_logo_source3" value="<?php echo $key3; ?>" <?php echo $logo_source_selected3; ?> id="logo_source_id_<?php echo $key3; ?>3" />
            <a href="javascript:themater_logo_source_js3('<?php echo $key3; ?>');" class="tt_radio_button"><?php echo $val3; ?></a> </div>
        <?php
    }
    ?>
    <script type="text/javascript">
        function themater_logo_source_js3(source)
        {
            $thematerjQ("#themater_logo_image3").hide();
            $thematerjQ("#select_logo_source_image3 a").removeClass('tt_radio_button_current');
            $thematerjQ("#select_logo_source_image3").find(":radio").removeAttr("checked");

            $thematerjQ("#themater_logo_text3").hide();
            $thematerjQ("#select_logo_source_text3 a").removeClass('tt_radio_button_current');
            $thematerjQ("#select_logo_source_text3").find(":radio").removeAttr("checked");


            $thematerjQ("#themater_logo_" + source + "3").fadeIn();
            $thematerjQ("#select_logo_source_" + source + "3 a").addClass('tt_radio_button_current');
            $thematerjQ("#select_logo_source_" + source + "3").find(":radio").attr("checked", "checked");
        }
        jQuery(document).ready(function () {
            themater_logo_source_js3('<?php echo $get_logo_source3; ?>');
        });

    </script>
    <?php
}

/* * ********************** */

function themater_logo_source4() {
    global $theme;
    $get_logo_source4 = $theme->get_option('themater_logo_source4');
    $logo_sources4 = array('image' => 'أدسنس', 'text' => 'صورة الإعلان');

    foreach ($logo_sources4 as $key4 => $val4) {
        $logo_source_selected4 = $get_logo_source4 == $key4 ? 'checked="checked"' : '';
        ?>

        <div id="select_logo_source_<?php echo $key4; ?>4" class="tt_radio_button_container">
            <input type="radio" name="themater_logo_source4" value="<?php echo $key4; ?>" <?php echo $logo_source_selected4; ?> id="logo_source_id_<?php echo $key4; ?>4" />
            <a href="javascript:themater_logo_source_js4('<?php echo $key4; ?>');" class="tt_radio_button"><?php echo $val4; ?></a> </div>
        <?php
    }
    ?>
    <script type="text/javascript">
        function themater_logo_source_js4(source)
        {
            $thematerjQ("#themater_logo_image4").hide();
            $thematerjQ("#select_logo_source_image4 a").removeClass('tt_radio_button_current');
            $thematerjQ("#select_logo_source_image4").find(":radio").removeAttr("checked");

            $thematerjQ("#themater_logo_text4").hide();
            $thematerjQ("#select_logo_source_text4 a").removeClass('tt_radio_button_current');
            $thematerjQ("#select_logo_source_text4").find(":radio").removeAttr("checked");


            $thematerjQ("#themater_logo_" + source + "4").fadeIn();
            $thematerjQ("#select_logo_source_" + source + "4 a").addClass('tt_radio_button_current');
            $thematerjQ("#select_logo_source_" + source + "4").find(":radio").attr("checked", "checked");
        }
        jQuery(document).ready(function () {
            themater_logo_source_js4('<?php echo $get_logo_source4; ?>');
        });

    </script>
    <?php
}

/* * ********************** */

function themater_logo_source5() {
    global $theme;
    $get_logo_source5 = $theme->get_option('themater_logo_source5');
    $logo_sources5 = array('image' => 'أدسنس', 'text' => 'صورة الإعلان');

    foreach ($logo_sources5 as $key5 => $val5) {
        $logo_source_selected5 = $get_logo_source5 == $key5 ? 'checked="checked"' : '';
        ?>

        <div id="select_logo_source_<?php echo $key5; ?>5" class="tt_radio_button_container">
            <input type="radio" name="themater_logo_source5" value="<?php echo $key5; ?>" <?php echo $logo_source_selected5; ?> id="logo_source_id_<?php echo $key5; ?>5" />
            <a href="javascript:themater_logo_source_js5('<?php echo $key5; ?>');" class="tt_radio_button"><?php echo $val5; ?></a> </div>
        <?php
    }
    ?>
    <script type="text/javascript">
        function themater_logo_source_js5(source)
        {
            $thematerjQ("#themater_logo_image5").hide();
            $thematerjQ("#select_logo_source_image5 a").removeClass('tt_radio_button_current');
            $thematerjQ("#select_logo_source_image5").find(":radio").removeAttr("checked");

            $thematerjQ("#themater_logo_text5").hide();
            $thematerjQ("#select_logo_source_text5 a").removeClass('tt_radio_button_current');
            $thematerjQ("#select_logo_source_text5").find(":radio").removeAttr("checked");


            $thematerjQ("#themater_logo_" + source + "5").fadeIn();
            $thematerjQ("#select_logo_source_" + source + "5 a").addClass('tt_radio_button_current');
            $thematerjQ("#select_logo_source_" + source + "5").find(":radio").attr("checked", "checked");
        }
        jQuery(document).ready(function () {
            themater_logo_source_js5('<?php echo $get_logo_source5; ?>');
        });

    </script>
    <?php
}
?>
