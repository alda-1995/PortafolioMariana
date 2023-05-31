<?php

add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
function mw_enqueue_color_picker( $hook_suffix ) {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', my_canalla_settings_url().'/inc/fau-colorpicker.js', array( 'wp-color-picker' ), false, true );
}

// Customize Fancy Admin UI Colors



$fau_color_settings = new fau_color_settings();
class fau_color_settings {
    function __construct() {
        add_filter( 'admin_init' , array( &$this , 'register_fields' ) );
    }
    function register_fields() {
        register_setting( 'general', 'fau_primary_color', 'esc_attr' );
        add_settings_field('fau_primary_color', '<label for="fau_primary_color">'.__('Canalla UI | Color Primario: ' , 'fau_primary_color' ).'</label>' , array(&$this, 'fields_html') , 'general' );
    }
    function fields_html() {
        $value = get_option( 'fau_primary_color', '' );
        echo '<input type="text" id="fau_primary_color" name="fau_primary_color" value="' . $value . '" data-default-color="#3498db" />';
        echo "
          <script>
            jQuery(document).ready(function($){
              $('#fau_primary_color').wpColorPicker();
            });
          </script>
          ";
    }
}

$fau_secondary_color_settings = new fau_secondary_color_settings();
class fau_secondary_color_settings {
    function __construct() {
        add_filter( 'admin_init' , array( &$this , 'register_fields' ) );
    }
    function register_fields() {
        register_setting( 'general', 'fau_secondary_color', 'esc_attr' );
        add_settings_field('fau_secondary_color', '<label for="fau_secondary_color">'.__('Canalla UI | Color Secundario:' , 'fau_secondary_color' ).'</label>' , array(&$this, 'fields_html') , 'general' );
    }
    function fields_html() {
        $value = get_option( 'fau_secondary_color', '' );
        echo '<input type="text" id="fau_secondary_color" name="fau_secondary_color" value="' . $value . '" data-default-color="#2581bf" />';
        echo "
          <script>
            jQuery(document).ready(function($){
              $('#fau_secondary_color').wpColorPicker();
            });
          </script>
          ";
    }
}


$fau_logo_image_settings = new fau_logo_image_settings();
class fau_logo_image_settings {
    function __construct() {
        add_filter( 'admin_init' , array( &$this , 'register_fields' ) );
    }
    function register_fields() {
        register_setting( 'general', 'myprefix_image_id', 'esc_attr' );
        add_settings_field('myprefix_image_id', '<label for="myprefix_image_id">'.__('Canalla UI | Imagen Logo:' , 'myprefix_image_id' ).'</label>' , array(&$this, 'fields_html') , 'general' );
    }
    function fields_html() {
        $image_id = get_option( 'myprefix_image_id' );
        $color_bg_custom = get_option( 'fau_primary_color', '' );
        if( intval( $image_id ) > 0 ) {
            // Change with the image size you want to use
            $image = '<div class="image_option" style="background: '.$color_bg_custom.'">'.wp_get_attachment_image( $image_id, 'thumbnail', false, array( 'id' => 'myprefix-preview-image' ) ).'</div>';
        } else {
            // Some default image
            $image = '<div class="image_option" style="background: '.$color_bg_custom.'"><img id="myprefix-preview-image" src="../wp-content/plugins/canalla/inc/logo.svg"/></div>';
            ?>
                <script>
                    localStorage.setItem("image_logo", "");
                </script>
            <?php
        }
        ?>
        
        <?php echo $image; ?>
        <br>
        <input type="hidden" name="myprefix_image_id" id="myprefix_image_id" value="<?php echo esc_attr( $image_id ); ?>" class="regular-text" />
        <input type='button' class="button-primary" value="<?php esc_attr_e( 'Select a image', 'mytextdomain' ); ?>" id="myprefix_media_manager"/>
        <?php
    }
}

add_action( 'admin_enqueue_scripts', 'load_wp_media_files' );
function load_wp_media_files( $page ) {
  // change to the $page where you want to enqueue the script
  if( $page == 'options-general.php' ) {
    // Enqueue WordPress media scripts
    wp_enqueue_media();
    // Enqueue custom script that will interact with wp.media
    wp_enqueue_script( 'myprefix_script',  my_canalla_settings_url().'/inc/myscript.js', array('jquery'), '0.1' );
  }
}

// Ajax action to refresh the user image
add_action( 'wp_ajax_myprefix_get_image', 'myprefix_get_image'   );
function myprefix_get_image() {
    if(isset($_GET['id']) ){
        $image = wp_get_attachment_image( filter_input( INPUT_GET, 'id', FILTER_VALIDATE_INT ), 'thumbnail', false, array( 'id' => 'myprefix-preview-image' ) );
        $data = array(
            'image'    => $image,
        );
        wp_send_json_success( $data );
    } else {
        wp_send_json_error();
    }
}

function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
   }
   add_filter('upload_mimes', 'cc_mime_types');


?>