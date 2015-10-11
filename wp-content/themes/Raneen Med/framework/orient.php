<?php
	
	// for excerpt 
	function string_limit_words($string, $word_limit)
	  {
		$words = explode(' ', $string, ($word_limit + 1));
		if(count($words) > $word_limit)
		array_pop($words);
		return implode(' ', $words);
	  }
	
/***************************************************************
@
@	Comments Fanctions
@
/**************************************************************/
function nasj_comment ($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div class="contentWidget" id="comment-<?php comment_ID(); ?>">
  	<div class="c-avatar">
    	<?php echo get_avatar( $comment, 80 ); ?>
    </div>
    
    <div class="c-info">
    	<h4><?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?></h4>
        <span class="meta-date-comment"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></span>
        <div class="clearfix"></div>
        <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('تعليقك يحتاج إلى مراجعة المدير .') ?></em>
         <br />
      <?php endif; ?>

      <?php comment_text() ?>

		
        
      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
      
    </div>
    
  <div class="clearfix"></div>
</div>

<?php
        }
	  
/* display author info  */
function about_author($author_id)
{
	 $curauth =  get_userdata($author_id);
	?>
    
    
   
        
        
    <div class="about-author"> <?php echo get_avatar($curauth->user_email); ?>
            <h2><?php the_author_posts_link(); ?></h2>
            <p><?php echo $curauth->user_description; ?></p>
            <div class="clearfix"></div>
          </div>
    
        
        
    

    <?php       
}