<? /*Template Name: صفحة اتصل بنا*/ ?>
<?php
//contact_sent_message
//emailAddress
global $data;
global $theme;
get_header();
$errors = array();
$sent = false;
if (isset($_POST['submit'])) {
    if (trim($_POST['contact_name']) == '' || trim($_POST['contact_name']) == 'Name (required)') {
        $errors[] = ('<div class="alert alert-danger" style="display:block; font-size:13px;">برجاء ادخال اسمك  </div>');
    } else {
        $name = trim($_POST['contact_name']);
    }
    $subject = trim($_POST['url']);

    if (trim($_POST['email']) == '' || trim($_POST['email']) == 'Email (required)') {
        $errors[] = ('<div class="alert alert-success" style="display:block;"> برجاء ادخال بريد الكتروني صالح </div>');
    } else if (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
        $errors[] = ('<div class="alert alert-danger" style="display:block; font-size:13px;"> برجاء ادخال بريد الكتروني صالح </div>');
    } else {
        $email = trim($_POST['email']);
    }

    if (trim($_POST['mob']) == '' || trim($_POST['mob']) == 'Name (required)') {
        $errors[] = ('<div class="alert alert-danger" style="display:block; font-size:13px;"> برجاء  ادخال رقم الجوال الخاص بك </div>');
    } else {
        $mob = trim($_POST['mob']);
    }

    if (trim($_POST['msg']) == '' || trim($_POST['msg']) == 'Message') {
        $errors[] = ('<div class="alert alert-danger" style="display:block; font-size:13px;"> برجاء قم بكتابة محتوي للرسالة </div>');
    } else {
        if (function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['msg']));
        } else {
            $comments = trim($_POST['msg']);
        }
    }
    $message = '';

    if (empty($errors)) {
        $emailTo = 'elfnanabokarim@gmail.com';
        $body = "Name: $name \n\nEmail: $email \n\nMobile: $mob \n\nSubject: رسالة جديدة من موقع لمسة ابداع \n\nMessage:\n $comments";
        $headers = '';
        $mail = wp_mail($emailTo, $subject, $body, $headers);
        $sent = true;
        $message = 'لقد تم ارسال رسالتك بنجاح ';
    } else {
        $message = implode('<br />', $errors);
    }
}
?>  
<?php get_header();?>

        <div class="Gal_titly">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                    <h1>اتصل بنا</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="Go_map">
<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="100%" height="443" src="https://maps.google.com/maps?hl=en&q=King Abdul Aziz, Riyad, Riyadh Province, Saudi Arabia&ie=UTF8&t=roadmap&z=7&iwloc=B&output=embed"><div><small><a href="http://embedgooglemaps.com">embedgooglemaps.com</a></small></div><div><small><a href="http://www.premiumlinkgenerator.com/">free link generators on premiumlinkgenerator.com</a></small></div></iframe>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="con_dir">
                        <h1>تواصل معنا مباشرة</h1>
                        <p>نرحب باتصالك او استفسارك فى اى وقت</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="Address">

                        <img src="<?php echo IMAGES;?>/pinmap.png">
                        <span>العنوان&nbsp; &nbsp; &nbsp;: 
                        
                      
                        </span> 
                        <span class="sp-black">

                         <?php echo $theme->get_option('adress'); ?>
                            
                        </span>


                    </div>

                </div>

            </div>

        </div>
        
        
        <div class="container departs">
            <div class="row">
                <div class="col-md-4 col-md-pull-4">
                           <div class="admin">
                            

                            <ul>


                                <li>    
                                    <img src="<?php echo IMAGES;?>/phone.png">
                                    
                                    <span> رقم الموبايل  &nbsp; : </span>
                                    <p> <?php echo $theme->get_option('phone'); ?></p>
                                </li>
                            </ul>

                               <div class="clearfix"></div> 

                        </div>
                </div>
   
                
            </div>
            
        </div>
        
        
          <div class="contact_con">
              
           <div class="container">
            <div class="row">
            <div class="col-md-12">
                <p class="contact_message">
                    <?php
                    if ($sent == true) {
                        echo '<div class="alert alert-success" style="display:block;"> ' . $message . '</div>';
                    } else {
                        echo $message;
                    }
                    ?>
                </p>
            </div>
                
                <form action="" method="post" class="contact_message">
                    <div class="row">
                <div class="col-md-4">
              <div class="contacttxt">      
                  <input type="text" class="constyle validate" name="contact_name" placeholder="<?php _e('الإسم','theme'); ?>">
              </div>
                </div>
                     <div class="col-md-4">
                         <div class="contacttxt">
                        <input class="constyle  validate" name="email" type="text" placeholder="<?php _e('بريدك الإلكترونى','theme'); ?>">
                         </div>
                     </div>
                     
                     <div class="col-md-4">
                         <div class="contacttxt">
                      <input type="text" class="constyle  validate" name="mob" placeholder="<?php _e('رقم الهاتف','theme'); ?>">
                         </div>
                  </div>
                    </div>
                    <div class="row">
                     <div class="col-md-12">
                          <div class="contactarea">
                              <textarea  class="form-control validate" name="msg"  rows="2" cols="100%" placeholder="<?php _e('اكتب الرسالة هنا','theme'); ?>"> </textarea>
             
                          </div>
                         
                                  <div class="contactbtn">
                                      <input class="mnbtn" name="submit" type="submit" id="submit" value="<?php _e('إرسال','theme'); ?>">
                             </div>
                   
                     </div>
                    </div>
                </form>
                    
            </div>
            </div>
        </div>
        
<?php get_footer();
