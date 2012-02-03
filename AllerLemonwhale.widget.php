<?php
/**
 *  Aller Lemonwhale as a widget.
 *
 *  @package Wordpress 3
 *  @subpackage Aller Lemonwhale Integration
 */
class AllerLemonwhale_Widget extends WP_Widget {
  /**
   *  Widget actual processes
   */
  function __construct() {
    parent::__construct('', 'Aller Lemonwhale', array('description' => __('Aller Lemonwhale as a widget.')));
  }
  
  /**
   *  Outputs the options form on admin
   *
   *  @param array $instance
   */
  function form($instance) {
    $content = $instance ? esc_attr($instance['content']) : '';
    
    include(dirname(__FILE__) . '/templates/widget.admin.php');
  }
  
  /**
   *  Processes widget options to be saved.
   *
   *  @param array $new_instance
   *  @param array $old_instance
   */
  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['content'] = $new_instance['content'];
    
    $AllerLemonwhale = new AllerLemonwhale();
    $videoid = $AllerLemonwhale->simple_regexp('%id=([^"&]+)%s', $instance['content']);
    $playerid = $AllerLemonwhale->simple_regexp('%pi=([^&"]+)%s', $instance['content']);
    $width = $AllerLemonwhale->simple_regexp('%width="([^"]+)%s', $instance['content']);
    if (empty($width))
      $width = 250;
    $height = $AllerLemonwhale->simple_regexp('%height="([^"]+)%s', $instance['content']);
    if (empty($height))
      $height = $width/16*9;
    
    
    ob_start();
    include($AllerLemonwhale->get_template('videoplayer'));
    $instance['content'] = ob_get_clean();
    
    return $instance;
  }
  
  /**
   *  Outputms the content of the widget.
   *
   *  @param array $args
   *  @param array $instance
   */
  function widget($args, $instance) {
    extract($args);
    extract($instance);
    
    include(dirname(__FILE__) . '/templates/widget.php');
  }
}