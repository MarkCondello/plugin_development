<?php 
/*
Plugin Name: Antelope Genral Social Media Links
Author: Markamus
Version : 1.0
*/

//load text domain for localized languages: https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
load_plugin_textdomain('agsml', false, basename(dirname(__FILE__)));

add_action('admin_menu', 'agsml_create_menu');
function agsml_create_menu(){
    //add top level menu and settings page
    add_options_page("Antelope General Social Media Links", "AG Social Media Links", 'manage_options', __FILE__, 'agsml_settings_page');
    add_filter("plugin_action_links", "agsml_settings_link", 10, 2);
    //call refister settings function
    add_action("admin_init", 'agsml_register_settings');
}

//add settings link to plugins list
function agsml_settings_link($links, $file){
    static $this_plugin;
    if(!$this_plugin) $this_plugin = plugin_basename(__FILE__);

    if($file == $this_plugin) {
        $settings_link = '<a href="options-general.php?page=AGSsocialMedia/antelope-social-media-link.php">' .__("Settings", "agsml_social_media") . '</a>';
        array_unshift($links, $settings_link);
    }
    return $links;
}

/*The register_setting() function is useful for defining the data you want to save for your plugin,
and takes the following parameters:
register_setting( $option_group, $option_name, $sanitize_callback )*/
function agsml_register_settings(){
    register_setting('antelope_social_group', 'agsml_facebook');
    register_setting('antelope_social_group', 'agsml_twitter');
    register_setting('antelope_social_group', 'agsml_youtube');
    register_setting('antelope_social_group', 'agsml_linkedin');
}

function agsml_settings_page() { 
    /* the inputs use form_option() which sanitizes data received */
?>
    <div class="wrap agsml_social_list">
        <h2>Antelope General Social Media Links</h2>
        <form method="post" action="options.php">
            <?php settings_fields( 'antelope_social_group' ); ?>
            <div class="setting">
                <p class="label_title"><?php _e('Facebook Profile URL:', 'agsml') ?></p>
                <p><label class="no_bold" for="agsml_facebook"><span class="slim">
                <?php _e('Facebook URL', 'agsml') ?></span>
                    <input name="agsml_facebook" type="text" id="agsml_facebook"
                value="<?php form_option('agsml_facebook'); ?>" /></label></p>
                <p class="desc"><?php _e('Enter URL to your Facebook profile.') ?></p>

                <p class="label_title"><?php _e('Twitter Profile URL:', 'agsml') ?></p>
                <p><label class="no_bold" for="agsml_twitter"><span class="slim">
                <?php _e('Twitter URL', 'agsml') ?></span>
                    <input name="agsml_twitter" type="text" id="agsml_twitter"
                value="<?php form_option('agsml_twitter'); ?>" /></label></p>
                <p class="desc"><?php _e('Enter the URL to your Twitter profile.') ?></p>

                <p class="label_title"><?php _e('YouTube Profile URL:', 'agsml') ?></p>
                <p><label class="no_bold" for="agsml_youtube"><span class="slim">
                <?php _e('YouTube URL', 'agsml') ?></span>
                    <input name="agsml_youtube" type="text" id="agsml_youtube"
                value="<?php form_option('agsml_youtube'); ?>" /></label></p>
                <p class="desc"><?php _e('Enter the URL to your YouTube profile.') ?></p>

                <p class="label_title"><?php _e('LinkedIn Profile URL:', 'agsml') ?></p>
                <p><label class="no_bold" for="agsml_linkedin"><span class="slim">
                <?php _e('LinkedIn URL', 'agsml') ?></span>
                    <input name="agsml_linkedin" type="text" id="agsml_linkedin"
                value="<?php form_option('agsml_linkedin'); ?>" /></label></p>
                <p class="desc"><?php _e('Enter the URL to your LinkedIn profile.', 'agsml') ?>
                </p>

                <p class="setting">
                    <input type="submit" class="button-primary"
                value="<?php _e('Save Social Media Links', 'agsml') ?>" />
                </p>
            </div>
        </form>
    </div>
<?php 
}

function agsml_enqueue_styles(){
     wp_enqueue_style('agsml_stylesheet', plugins_url('/agsml-stylesheet.css', __FILE__ ));  
}
add_action('wp_enqueue_scripts', 'agsml_enqueue_styles' );

 ?>