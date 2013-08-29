<?php 
add_action('admin_menu', 'global_menu');
add_action( 'admin_init', 'register_globalsettings' );
function global_menu()
{
	add_options_page(__('Global Settings','global-site-settings'), __('Global Settings','global-site-settings'), 'manage_options', 'globalsitesettings', 'global_settings_page');
}

function register_globalsettings() { // whitelist options
  register_setting( 'global-group', 'slelect_page' );
 
  
}

function global_settings_page()
{
?>
<style>
textarea, input[type="text"], input[type="password"], input[type="file"], input[type="email"], input[type="number"], input[type="search"], input[type="tel"], input[type="url"], select{width:250px !important;}
</style>
<div class="wrap">
<h2>Global Information</h2>
<div class="postbox" id="poststuff">
<div class="handlediv" title="Click to toggle"><br></div>
  <h3 class="hndle">Settings</h3>
  <form method="post" action="options.php" name="GolbalSiteOptions">
  <?php settings_fields( 'global-group' ); ?>
    <table cellspacing="0" cellpadding="10" class="settingTable">
      <tbody>
        <tr>
          <td><strong>Select Page </strong></td>
          <td>:</td>
          <td>
          <select name="slelect_page"> 
 <option value="">
<?php echo esc_attr( __( 'Select page' ) ); ?></option> 
 <?php 
  $pages = get_pages(); 
  foreach ( $pages as $page ) { ?>
  	<option <?php if(get_option('slelect_page')==  $page->ID ){ echo 'selected="selected"';}?>  value="<?php echo  $page->ID  ?>">
	<?php echo $page->post_title ?>
	</option>
	<?php } ?>
</select>
          </td>
        </tr>
       

        
        <tr>
          <td> <?php submit_button(); ?></td>
        </tr>
      </tbody>
    </table>
  </form>
</div>
</div>
<?php } ?>