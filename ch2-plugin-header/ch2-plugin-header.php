<?php
/*
Plugin Name:	Chapter 2 - Plugin Header Output
Plugin URI:
Description:	Declares a plugin that will be visible in the WordPress admin interface
Version:		1.0
Author:			Yannick Lefebvre
Author URI:		http://ylefebvre.ca
License:		GPLv2
*/
function ch2pho_page_header_output(){
?>
<!-- Global Site Tag (gtag.js) - Google Analytics | Using markcondello.com.au account tracking id -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126447053-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-126447053-1');
</script>
<?php
    
}

add_action('wp_head', 'ch2pho_page_header_output');