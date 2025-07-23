<?php
/*
Plugin Name: Coming Soon Mode
Plugin URI: https://zapstart.digital/plugins/coming-soon-mode
Description: Displays a coming soon landing page for visitors while site is under construction.
Version: 1.5
Requires at least: 5.2
Requires PHP: 7.2
Author: ZAPSTART Digital
Author URI: https://zapstart.digital
Text Domain: coming-soon-mode

*/

if (!defined('ABSPATH')) exit;

// Show landing page for non-logged-in users
add_action('template_redirect', function () {
    if (!current_user_can('edit_posts')) {
        $enabled = get_option('csm_enabled');
        if ($enabled) {
            include plugin_dir_path(__FILE__) . 'coming-soon-template.php';
            exit;
        }
    }
});




// Admin settings
add_action('admin_menu', function () {
    add_options_page('Coming Soon Settings', 'Coming Soon', 'manage_options', 'coming-soon-settings', 'csm_settings_page');
});

add_action('admin_init', function () {
    register_setting('csm_settings_group', 'csm_enabled');
    register_setting('csm_settings_group', 'csm_title');
    register_setting('csm_settings_group', 'csm_message');
    register_setting('csm_settings_group', 'csm_launch_date');
    register_setting('csm_settings_group', 'csm_logo');
register_setting('csm_settings_group', 'csm_bg_image');
register_setting('csm_settings_group', 'csm_text_color');

});

function csm_settings_page() {
    ?>
    <div class="wrap">
        <h1>Coming Soon Settings</h1>
        <form method="post" action="options.php">
            <?php settings_fields('csm_settings_group'); ?>
            <?php do_settings_sections('csm_settings_group'); ?>
           <table class="form-table">
    <tr valign="top">
        <th scope="row">Enable Coming Soon Mode</th>
        <td><input type="checkbox" name="csm_enabled" value="1" <?php checked(1, get_option('csm_enabled'), true); ?> /></td>
    </tr>
    <tr valign="top">
        <th scope="row">Logo URL</th>
        <td>
            <input type="text" name="csm_logo" value="<?php echo esc_attr(get_option('csm_logo')); ?>" class="regular-text" />
            <p class="description">Upload your logo via Media Library and paste the URL here.</p>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row">Background Image URL</th>
        <td>
            <input type="text" name="csm_bg_image" value="<?php echo esc_attr(get_option('csm_bg_image')); ?>" class="regular-text" />
            <p class="description">Upload a background image and paste the URL here.</p>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row">Text Color</th>
        <td>
            <input type="color" name="csm_text_color" value="<?php echo esc_attr(get_option('csm_text_color', '#ffffff')); ?>" />
        </td>
    </tr>
    <tr valign="top">
        <th scope="row">Title</th>
        <td><input type="text" name="csm_title" value="<?php echo esc_attr(get_option('csm_title', 'Coming Soon')); ?>" class="regular-text"/></td>
    </tr>
    <tr valign="top">
        <th scope="row">Message</th>
        <td><textarea name="csm_message" rows="5" class="large-text"><?php echo esc_textarea(get_option('csm_message', 'Our site is under construction. Stay tuned!')); ?></textarea></td>
    </tr>
    <tr valign="top">
        <th scope="row">Launch Date (optional)</th>
        <td><input type="date" name="csm_launch_date" value="<?php echo esc_attr(get_option('csm_launch_date')); ?>" /></td>
    </tr>
</table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
