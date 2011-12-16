<?php
/**
 *  Plugin Name: Aller Lemonwhale Integration
 *  Description: Integrates your lemonwhale video into Wordpress.
 *  Author: Johannes Henrysson <johannes.henrysson@aller.se>, Aller Media AB
 *  Author URI: http://aller.se/
 *  Version: 0.1a
 */
require_once(dirname(__FILE__) . '/AllerLemonwhale.class.php');

if (isset($allerLemonwhale))
  return FALSE;

$allerLemonwhale = new AllerLemonwhale();