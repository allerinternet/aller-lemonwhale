<div class="wrap">
  <h2>Lemonwhale <?php _e('administration', 'aller-lemonwhale'); ?></h2>
  <?php if (isset($saved) && $saved) : ?>
    <div id="message" class="updated fade">
      <?php _e('Success! Your changes were successfully saved.', 'aller-lemonwhale'); ?>
    </div>
  <?php elseif (isset($saved) && !$saved) : ?>
    <div id="message" class="error">
      <?php _e('Error! No changes were saved.', 'aller-lemonwhale'); ?>
    </div>
  <?php endif; ?>
  
  <h3><?php _e('Available settings for shortcode', 'aller-lemonwhale'); ?></h3>
  <ul>
    <li>
      <img src="<?php print plugins_url('aller-lemonwhale/images/lemonwhale-demo.jpg'); ?>" alt="Lemonwhale videoid" title="Lemonwhale videoid"><br>
      <b>link</b><br>
      <?php _e('Copy link from video (from manage videos page at Lemonwhale). Don\'t forget to choose HTML5.', 'aller-lemonwhale'); ?>
    </li>
    
    <li>
      <b>width</b><br>
      <?php _e('Set width of player.', 'aller-lemonwhale'); ?>
    </li>
    
    <li>
      <b>height</b><br>
      <?php _e('Set height of player.', 'aller-lemonwhale'); ?>
    </li>
  </ul>
  <p><i><?php _e('Write the shortcode in any post or on any page.', 'aller-lemonwhale'); ?></i></p>
  
  <br class="clear">
  
  <h3><?php _e('Examples', 'aller-lemonwhale'); ?>:</h3>
  <pre>
    [lemonwhale http://ljsp.lwcdn.com/api/video/embed.jsp?id=383195de-02d5-4476-8f50-d660201aadc6&pi=35770b64-93b6-4fa6-b5ab-d76ba0dc5296]
    [lemonwhale http://ljsp.lwcdn.com/api/video/embed.jsp?id=383195de-02d5-4476-8f50-d660201aadc6&pi=35770b64-93b6-4fa6-b5ab-d76ba0dc5296 width="300" height="150"]
  </pre>
  
  <br class="clear">
  
  <form action="" method="POST">
    <h3><?php _e('General settings', 'aller-lemonwhale'); ?></h3>
    <table class="form-table">
      <tbody>
        <tr>
          <th scope="row"><label for="width"><?php _e('Width', 'aller-lemonwhale'); ?></label></th>
          <td><input type="text" name="width" id="width" value="<?php if (isset($width)) print $width; ?>" size="4"></td>
        </tr>
        <tr>
          <th scope="row"><label for="height"><?php _e('Height', 'aller-lemonwhale'); ?></label></th>
          <td><input type="text" name="height" id="height" value="<?php if (isset($height)) print $height; ?>" size="4"></td>
        </tr>
      </tbody>
    </table>
    
    <br class="clear">
    
    <p class="submit">
      <input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Save changes', 'aller-lemonwhale'); ?>">
    </p>
  </form>
</div>

<script type="text/javascript">
  jQuery('#width').keyup(function() {
    var width = jQuery(this).val();
    var height = width / 16 * 9;
    jQuery('#height').val(Math.round(height));
  });
</script>