<?php
function sh_pagination($pages = '', $range = 5)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagi'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'></a>";
          if($paged >1) echo "<a href='".get_pagenum_link($paged - 1)."' class='P_pagi'></a>";
          if($paged ==1) echo "<a class='RP_pagi'></a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current_pagi'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive_pagi' >".$i."</a>";
             }
         }
      

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'></a>";  
//           if( $pages > $paged) echo "<a class='N_pagi' href='".get_pagenum_link($pages)."'></a>";
           
          
   if($pages > $paged) echo "<a href='".get_pagenum_link($paged + 1)."' class='N_pagi'> </a>";  
        if($paged > 1 && $pages <= $paged) echo "<a class='RN_pagi'> </a>";
          
           echo '<div class="clearfix"></div>';
         echo "</div>\n";
     }
}
?>