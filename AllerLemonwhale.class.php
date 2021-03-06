<?php
/**
 *  Main class of Aller Lemonwhale Integration plugin for Wordpress.
 *
 *  @package Wordpress 3
 *  @subpackage Aller Lemonwhale Integration
 */
class AllerLemonwhale
{  
  /**
   *  Old school constructor.
   */
  function AllerLemonwhale() {
    $this->__construct();
  }
  
  /**
   *  Modern constructor. Kick it alive!
   */
  function __construct() {
    add_action('init', array($this, 'load_translation'));
    add_action('admin_menu', array($this, 'add_options_page'));
    add_shortcode('lemonwhale', array($this, 'render_video_player'));
    
    // Add widget.
    add_action('widgets_init', create_function('', 'register_widget(\'AllerLemonwhale_Widget\');'));
  }
  
  /**
   *  Get an included file as string, instead of printing it right away.
   *
   *  @param string $path
   *    Path to file.
   *  @return string/boolean
   *    String if success, else FALSE.
   */
  function get_include_as_string($path) {
    if (is_file($path)) {
      ob_start();
      include($path);
      return ob_get_clean();
    }
    
    return FALSE;
  }
  
  /**
   *  Add Lemonwhale settings page to Wordpress administration menus.
   */
  function add_options_page() {
    add_submenu_page('options-general.php', 'Lemonwhale ' . __('administration'), 'Lemonwhale', 'publish_pages', 'aller-lemonwhale', array($this, 'render_admin_page'));
  }
  
  function get_template($name) {
    $path = dirname(__FILE__) . '/templates';
    $template_path = $path . "/{$name}-{$_SERVER['SERVER_NAME']}.php";
    
    if (file_exists($template_path))
      return $template_path;
    else
      return $path . "/{$name}.php";
  }
  
  function load_translation() {
    load_plugin_textdomain('aller-lemonwhale', FALSE, dirname(plugin_basename(__FILE__)) . '/lang/');
  }
  
  /**
   *  Render admin page, to set up plugin.
   */
  function render_admin_page() {    
    if (!current_user_can('publish_pages'))
      wp_die(__('You do not have sufficient permissions to access this page.'));
    
    if (isset($_POST['submit']))
      $saved = update_option('aller_lemonwhale', $_POST);
    $settings = get_option('aller_lemonwhale');
    if (is_array($settings))
      extract($settings);
    
    include($this->get_template('admin'));
  }
  
  /**
   *  Render videoplayer, initiated by shortcode.
   *
   *  @param array $args
   *    Arguments passed by shortcode.
   *  @return string
   *    Complete videoplayer.
   */
  function render_video_player($args = array()) {
    // Import general values from database.
    $settings = get_option('aller_lemonwhale');
    if (is_array($settings))
      extract($settings);
    
    $width = isset($args['width']) ? $args['width'] : $width;
    $height = isset($args['height']) ? $args['height'] : $height;
    
    // Find necessary ids.
    $videoid = $this->simple_regexp('%id=([^"&]+)%s', $args[0]);
    $playerid = $this->simple_regexp('%pi=([^"&]+)%s', $args[0]);
    
    // Include template as string, otherwise we can't return it.
    ob_start();
    include($this->get_template('videoplayer'));
    return ob_get_clean();
  }
  
  /**
   *  Run a simple regexp, and return wanted result.
   *
   *  @param string $regexp
   *  @param string $haystack
   *    Haystack to search for.
   *  @param int response
   *    Which response are we searching for ($match[1] default).
   *  @return string
   *    Result from regexp, $match[1] as default.
   */
  function simple_regexp($regexp, $haystack, $response = 1) {
    if (!preg_match($regexp, $haystack, $result))
      return '';
    
    $result = !empty($result[$response]) ? $result[$response] : '';
    return $result;
  }
}