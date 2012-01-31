<div class="wrap">
  <h2>Lemonwhale <?php _e('administration'); ?></h2>
  <?php if (isset($saved) && $saved) : ?>
    <div id="message" class="updated fade">
      <?php _e('Success! Your changes were successfully saved.'); ?>
    </div>
  <?php elseif (isset($saved) && !$saved) : ?>
    <div id="message" class="error">
      <?php _e('Error! No changes were saved.'); ?>
    </div>
  <?php endif; ?>
  
  <h3><?php _e('Available settings for shortcode'); ?></h3>
  <ul>
    <li>
      <img src="<?php print plugins_url('aller-lemonwhale/images/lemonwhale-demo.jpg'); ?>" alt="Lemonwhale videoid" title="Lemonwhale videoid"><br>
      <b>videoid</b><br>
      <?php _e('ID to choose video.'); ?>
    </li>
    
    <li>
      <b>width</b><br>
      <?php _e('Set width of player.'); ?>
    </li>
    
    <li>
      <b>height</b><br>
      <?php _e('Set height of player.'); ?>
    </li>
  </ul>
  <p><i><?php _e('Write the shortcode in any post or on any page.'); ?></i></p>
  
  <br class="clear">
  
  <h3><?php _e('Examples'); ?>:</h3>
  <pre>
    [lemonwhale videoid="32e66asdad2-2544-43q7-1313-a09ccdasd17f"]
    [lemonwhale videoid="32e66asdad2-2544-42q7-1313-a09ccdasd17f" width="300" height="150"]
  </pre>
  <p><i><?php _e('It\'s recommended to use general settings, as they automatically suggest 16:9'); ?></i></p>
  
  <br class="clear">
  
  <form action="" method="POST">
    <h3><?php _e('General settings'); ?></h3>
    <table class="form-table">
      <tbody>
        <tr>
          <th scope="row"><label for="width"><?php _e('Width'); ?></label></th>
          <td><input type="text" name="width" id="width" value="<?php if (isset($width)) print $width; ?>" size="4"></td>
        </tr>
        <tr>
          <th scope="row"><label for="height"><?php _e('Height'); ?></label></th>
          <td><input type="text" name="height" id="height" value="<?php if (isset($height)) print $height; ?>" size="4"></td>
        </tr>
      </tbody>
    </table>
    
    <br class="clear">
    
    <p class="submit">
      <input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Save changes'); ?>">
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