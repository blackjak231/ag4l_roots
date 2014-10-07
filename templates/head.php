<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <?php wp_head(); ?>
	<script type="text/javascript">
   $(document).ready(function () {
    var WidthNavbar = document.getElementById('fixedit').offsetWidth;
    var WindowWidth = $(window).width();
    if(WindowWidth >= 768){
    	$("#scrollit").css("margin-left", WidthNavbar);
    }
    window.addEventListener("resize", function () {
         WidthNavbar = document.getElementById('fixedit').offsetWidth;
         WindowWidth = $(window).width();
    if(WindowWidth >= 768){
    	$("#scrollit").css("margin-left", WidthNavbar);
    }
    else{
    	$("#scrollit").css("margin-left", "auto");
    }
        
    });
});
   $( document ).ajaxComplete(function () {
    var WidthNavbar = document.getElementById('fixedit').offsetWidth;
    var WindowWidth = $(window).width();
    if(WindowWidth >= 768){
    	$("#scrollit").css("margin-left", WidthNavbar);
    } 
    });
  </script>
  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
</head>
