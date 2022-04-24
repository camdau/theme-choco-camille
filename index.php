<?php get_header();?>
<div class="container pt-3 pb-3">
 <?php
   if (have_posts()){

    while (have_posts() ){
        the_post();
        the_content();

    }
   }
?>   
</div>


<?php get_footer();?>