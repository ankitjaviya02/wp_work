<?php
/**
 * Bootstrap theme.
 *
 * The purpose of this file is to bootstrap your theme by loading all dependencies and helpers.
 *
 * YOU SHOULD NORMALLY NOT NEED TO ADD ANYTHING HERE - any custom functionality unrelated
 * to bootstrapping the theme should go into a service provider or a separate helper file
 * (refer to the directory structure in README.md).
 *
 * @package MyApp
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
  	Container::make( 'post_meta', __( 'File Upload' ) )
    ->where( 'post_type', '=', 'product' )
    ->add_fields( array( 
	    Field::make( 'file', 'product_pdf', 'Detail file' )


	) );
}




add_action('woocommerce_before_add_to_cart_form','solution_list');
function solution_list(){
	global $wpdb;
	global $product;
	$id = $product->get_id();

	$result = $wpdb->get_results ( "SELECT s.id, s.product_id, s.solution_name, sp.video_url  
       FROM solution s JOIN solution_product_video sp  ON s.id = sp.solution_id where s.product_id='$id' ");

 ?> 
 <?php 
//	 $slides = carbon_get_post_meta(get_the_ID(), 'product_pdf');

//	 echo 'DEMO--'.$slides;

 	echo '<h3>Solution: '.$result[0]->solution_name.'</h3>';
	foreach ( $result as $print ) {
		if($print->video_url!=null && $print->video_url!="") {
		?>
		 <div class="card">
	    <?= 
	    preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",	"<iframe width=\"250\" height=\"150\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$print->video_url);
	    ?>		
		</div>
<?php } }  }
/**
 * Define a content width for the theme.
 *
 * @link https://developer.wordpress.com/themes/content-width/
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1080;
}

// Make sure we can load a compatible version of WP Emerge.
require_once __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'version.php';

$name = trim( get_file_data( __DIR__ . DIRECTORY_SEPARATOR . 'style.css', [ 'Theme Name' ] )[0] );
$load = my_app_should_load_wpemerge( $name, '0.16.0', '2.0.0' );

if ( ! $load ) {
	// An incompatible WP Emerge version is already loaded - stop further execution.
	// my_app_should_load_wpemerge() will automatically add an admin notice.
	return;
}

// Load composer dependencies.
if ( file_exists( __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php' ) ) {
	require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
}

my_app_declare_loaded_wpemerge( $name, 'theme', __FILE__ );

// Load helpers.
require_once __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'MyApp.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'helpers.php';

// Bootstrap theme after all dependencies and helpers are loaded.
\MyApp::make()->bootstrap( require __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'config.php' );

// Register hooks.
require_once __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'hooks.php';
