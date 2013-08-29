<?php
/**
 * rtPanel functions and definitions
 *
 * @package rtPanel
 *
 * @since rtPanel 2.0
 */

define( 'RTP_VERSION', '3.0' );

/* Define Directory Constants */
define( 'RTP_ADMIN', get_template_directory() . '/admin' );
define( 'RTP_CSS', get_template_directory() . '/css' );
define( 'RTP_JS', get_template_directory() . '/js' );
define( 'RTP_IMG', get_template_directory() . '/img' );

/* Define Directory URL Constants */
define( 'RTP_TEMPLATE_URL', get_template_directory_uri() );
define( 'RTP_CSS_FOLDER_URL', get_template_directory_uri() . '/css' );
define( 'RTP_JS_FOLDER_URL', get_template_directory_uri() . '/js' );
define( 'RTP_IMG_FOLDER_URL', get_template_directory_uri() . '/img' );

$rtp_general = get_option( 'rtp_general' ); // rtPanel General Options
$rtp_post_comments = get_option( 'rtp_post_comments' ); // rtPanel Post & Comments Options
$rtp_version = get_option( 'rtp_version' ); // rtPanel Version

/* Check if default values are present in the database else force defaults - Since rtPanel v2.1 */
$rtp_general['pagination_show'] = isset( $rtp_general['pagination_show'] ) ? $rtp_general['pagination_show'] : 0;
$rtp_post_comments['prev_text'] = isset( $rtp_post_comments['prev_text'] ) ? $rtp_post_comments['prev_text'] : __( '&laquo; Previous', 'rtPanel' );
$rtp_post_comments['next_text'] = isset( $rtp_post_comments['next_text'] ) ? $rtp_post_comments['next_text'] : __( 'Next &raquo;', 'rtPanel' );
$rtp_post_comments['end_size']  = isset( $rtp_post_comments['end_size'] ) ? $rtp_post_comments['end_size'] : 1;
$rtp_post_comments['mid_size']  = isset( $rtp_post_comments['mid_size'] ) ? $rtp_post_comments['mid_size'] : 2;
$rtp_post_comments['attachment_comments']  = isset( $rtp_post_comments['attachment_comments'] ) ? $rtp_post_comments['attachment_comments'] : 0;

/* Includes PHP files located in 'lib' folder */
foreach( glob ( get_template_directory() . "/lib/*.php" ) as $lib_filename ) {
    require_once( $lib_filename );
}

/* Includes rtPanel Theme Options */
require_once( get_template_directory() . "/admin/rtp-theme-options.php" );

/* Includes Global Settings  */
include('globalsetting.php');

/* Video Custom Post Type  */
  $labels = array(
    'name' => 'video',
    'singular_name' => 'video',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Video',
    'edit_item' => 'Edit Video',
    'new_item' => 'New Video',
    'all_items' => 'All Videos',
    'view_item' => 'View Videos',
    'search_items' => 'Search Video',
    'not_found' =>  'No Video found',
    'not_found_in_trash' => 'No Video found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Video'
  );

  $args_video = array(
    'labels' => $labels,
    'public' => true,
   'publicly_queryable' => true,
    'show_ui' => true, 
   'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'video' ),
    'capability_type' => 'post',
   // 'has_archive' => false, 
    'hierarchical' => true,
    'menu_position' => null,
    'supports' => array( 'title', 'editor','custom-fields')
  ); 
  
  register_post_type( 'video', $args_video );
 
 /* Sports Custom Post Type  */ 
  
   $labels_sports = array(
    'name' => 'sports',
    'singular_name' => 'sports',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Sports',
    'edit_item' => 'Edit Sports',
    'new_item' => 'New Sports',
    'all_items' => 'All Sports',
    'view_item' => 'View Sports',
    'search_items' => 'Search Sports',
    'not_found' =>  'No Video Sports',
    'not_found_in_trash' => 'No Sports found in Trash', 
    'menu_name' => 'Sports'
  );
  
  $args_sports = array(
    'labels' => $labels_sports,
    'public' => true,
   'publicly_queryable' => true,
    'show_ui' => true, 
   'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'sports' ),
    'capability_type' => 'post',
   // 'has_archive' => false, 
    'hierarchical' => true,
    'menu_position' => null,
    'supports' => array( 'title', 'thumbnail')
  ); 
  
  register_post_type( 'sports', $args_sports );
  
   /* Our Partner Custom Post Type  */ 
   $labels_partner = array(
    'name' => 'partner',
    'singular_name' => 'partner',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Partner',
    'edit_item' => 'Edit Partner',
    'new_item' => 'New Partner',
    'all_items' => 'All Partner',
    'view_item' => 'View Partner',
    'search_items' => 'Search Partner',
    'not_found' =>  'No Partner',
    'not_found_in_trash' => 'No Partner found in Trash', 
    'menu_name' => 'Our Partner'
  );

  $args_partner = array(
    'labels' => $labels_partner,
    'public' => true,
   'publicly_queryable' => true,
    'show_ui' => true, 
   'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'partner' ),
    'capability_type' => 'post',
   // 'has_archive' => false, 
    'hierarchical' => true,
    'menu_position' => null,
    'supports' => array( 'title','thumbnail')
  ); 
  register_post_type( 'partner', $args_partner );
  
  /* Slider Custom Post Type  */ 
  
  $labels_slider = array(
    'name' => 'slider',
    'singular_name' => 'slider',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Slider',
    'edit_item' => 'Edit Slider',
    'new_item' => 'New Slider',
    'all_items' => 'All Sliders',
    'view_item' => 'View Slider',
    'search_items' => 'Search Slider',
    'not_found' =>  'No Slider',
    'not_found_in_trash' => 'No Slider found in Trash', 
    'menu_name' => 'Slider'
  );

  $args_slider = array(
    'labels' => $labels_slider,
    'public' => true,
   'publicly_queryable' => true,
    'show_ui' => true, 
   'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'slider' ),
    'capability_type' => 'post',
   // 'has_archive' => false, 
    'hierarchical' => true,
    'menu_position' => null,
    'supports' => array( 'title','thumbnail')
  ); 

	register_post_type( 'slider', $args_slider );

/* Create Custom Widget */

if (function_exists('register_sidebar')) {
     register_sidebar(array(
      'name' => 'Important Link',
      'id'   => 'important-link',
      'description'   => 'Add important link'
     ));
    }
	
if (function_exists('register_sidebar')) {
     register_sidebar(array(
      'name' => 'Footer  Logo',
      'id'   => 'footer-logo',
      'description'   => 'Add footer logo'
     ));
    }

if (function_exists('register_sidebar')) {
     register_sidebar(array(
      'name' => 'Facebook Widget',
      'id'   => 'facebook-widget',
      'description'   => 'Add Facebook Widget'
     ));
    }

if (function_exists('register_sidebar')) {
     register_sidebar(array(
      'name' => 'Tweeter Widget',
      'id'   => 'tweeter-widget',
      'description'   => 'Add Tweeter Widget'
     ));
    }

if (function_exists('register_sidebar')) {
     register_sidebar(array(
      'name' => 'Weather Widget',
      'id'   => 'weather-widget',
      'description'   => 'Add Weather Widget'
     ));
    }

if (function_exists('register_sidebar')) {
     register_sidebar(array(
      'name' => 'Date Time Widget',
      'id'   => 'date-time-widget',
      'description'   => 'Add Date Time Widget'
     ));
    }
	
if (function_exists('register_sidebar')) {
     register_sidebar(array(
      'name' => 'Search Widget',
      'id'   => 'search-widget',
      'description'   => 'Add Search Widget'
     ));
    }

if (function_exists('register_sidebar')) {
     register_sidebar(array(
      'name' => 'Footer Pages',
      'id'   => 'footer-pages',
	  'before_widget' => '<div>',
		'after_widget' => '</div>',
      'description'   => 'Add Flexi pages widget'
     ));
    }
/* Footer Link Shortcode */

function rtShortcode($atts, $content = null) {
   extract(shortcode_atts(array('url' => '#','title' =>''), $atts));
   return '<a title="'. $title. '"  href="'.$url.'"><span>' . do_shortcode($content) . '</span></a>';
}
add_shortcode('rt-link', 'rtShortcode');

/* Custom Links */

class iCLW extends WP_Widget {

	function __construct(){
		$options = array(
			'description' => 'You can add links by entering the URL and LINK NAME, this widget will automatically transform them into hyperlinks.',
			'name' => 'Link Widget'
		);
		parent::__construct('iCLW','',$options);
	}
	
	//Taking Input From User
	public function form($instance){
		extract($instance);
		?>
		<p>
		<label for="<?php echo $this->get_field_id('title');?>">Title: </label>
		<input class="widefat" style="background:#fff;" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" value="<?php if(isset($title)) echo esc_attr($title);?>"/>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('hLinks');?>">How Many Links You Want To Display? </label>
		<input type="number" min="1" max="20" class="widefat" style="background:#fff;width:40px;text-align:center;" id="<?php echo $this->get_field_id('numB');?>" name="<?php echo $this->get_field_name('numB');?>" value="<?php echo !empty($numB) ? $numB:1;?>"/>
		<br><i>Hit Save After Changing The Number. <b>Do Not Decrease The Number of Links</b>, If Does So, It Will Remove Some Links From The End Of The Array Permanently.</i>
		</p>
		<?php for($i=0;$i<$numB;$i++)
		{
		$count=$i+1;
		$target = 'iT'.$count;
		$link = 'iLink'.$count;
		$name = 'iName'.$count;
		?>
		<h4>Details for Link <?php echo $count;?></h4>

		<!-- New Window Opening Option -->
		<p>
			<label for="<?php echo $this->get_field_id($target);?>">Open Link In A New Window?</label>
			<input type="checkbox" class="checkbox" <?php checked($instance[$target], true) ?> id="<?php echo $this->get_field_id($target);?>" name="<?php echo $this->get_field_name($target);?>" value="1"/>
		</p>
		<!-- /New Window Opening Option -->

		<p>
		<label for="<?php echo $this->get_field_id($link);?>">URL: (Please Add http://) </label>
		<input class="widefat" style="background:#fff;" id="<?php echo $this->get_field_id($link);?>" name="<?php echo $this->get_field_name($link);?>" value="<?php if(isset($$link)) echo esc_attr($$link);?>"/>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id($name);?>">Link Title: </label>
		<input class="widefat" style="background:#fff;" id="<?php echo $this->get_field_id($name);?>" name="<?php echo $this->get_field_name($name);?>" value="<?php if(isset($$name)) echo esc_attr($$name);?>"/>
		</p>
		<?php
		}?>
		<?php
	}
	
	//Displaying The Data To Widget

	public function widget($args,$instance){
		extract($args);
		extract($instance);
		$title = apply_filters('widget_title',$title);
		
	//	echo $before_widget;
	//	echo $before_title . $title . $after_title;
		echo '<ul>';
		for($i=0;$i<$numB;$i++)
		{
		$count=$i+1;
		$target = 'iT'.$count;
		$link = 'iLink'.$count;
		$name = 'iName'.$count;
		if(empty($$name)) return false;

		//Determining Whether To Open In New Window Or Not
		if($$target == 1) {
				$tar = 'target="_blank" ';
			}else{
				$tar = '';
			}
		echo '<li><a '.$tar.'href="'.esc_attr($$link).'">'.esc_attr($$name).'</a></li>';
		}
		echo '</ul>';
		echo $after_widget;
	
	}
}
add_action('widgets_init','register_iCLW');
function register_iCLW(){
	register_widget('iCLW');
}





?>