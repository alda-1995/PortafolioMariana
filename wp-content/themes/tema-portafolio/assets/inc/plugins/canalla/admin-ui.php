<?php
/*
  Plugin Name:  Canalla Agency | Admin Theme
  Plugin URI:   http://canalla.agency/
  Description:  Cambiar color en Settings > Generales. En la parte de abajo antes de Guardar cambios vera las opciones de Canalla UI | Color Primario: [Color principal] Canalla UI | Color Secundario: [Color secundario].Para que el logo funcione debe de ser en formato SVG;
  Version:      1.3
  Author:       Canalla | Edgar Olivas Guzmán (TankDesing)
  Author URI:   http://canalla.agency/
  */

include_once('inc/settings.php');

/**
*
*	Mensaje de bienvenida personalizado.
*
* @author Edgar Olivas Guzmán
* @version 1.0
* @category Gutenberg
* @date 18-07-2019
*/    
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
  
function my_custom_dashboard_widgets() {
    // global $wp_meta_boxes;

    wp_add_dashboard_widget('custom_help_widget', 'Bienvenido', 'custom_dashboard_help');
}

function custom_dashboard_help() {
    $current_user = wp_get_current_user();
    echo '<div>';
    echo    '<img style="height: 100px; width: 40%;" src="'.get_template_directory_uri().'/assets/images/logo.svg" />';
    echo    '<p style="margin: 12px 0 2px 0;">¡Hola! <br/>Bienvenido a el administrador de contenidos.</p>';
    echo    '<p style="margin: 0;">En el siguiente link encontraras toda la información de como gestionar tu contenido.</p>';
    echo    '<ul style="list-style: none; padding: 0 0 0 18px;">';
    echo    '    <li><a href="'.get_site_url().'/manual">'.get_site_url().'/manual<a/></li>';
    echo    '</ul>';        
    echo    '<p style="display: flex; justify-content: flex-end; align-items: center;">';
    // echo        '<span>By Cnll</span>';
    // echo        '<svg style="width: 14px; height: auto; margin: 0 2px;" xmlns="http://www.w3.org/2000/svg" width="23.236" height="20.132" viewBox="0 0 23.236 20.132"><g id="heart" transform="translate(.141 .162)"><g id="Capa_1" data-name="Capa 1" transform="translate(-.141 -.162)"><path id="Trazado_743" d="M23.1 6.134a6.268 6.268 0 0 0-11.61-3.273 6.268 6.268 0 1 0-9.454 7.993l8.879 8.879a.81.81 0 0 0 1.144 0l8.879-8.879a6.245 6.245 0 0 0 2.162-4.72zm0 0" fill="#8fffd2" data-name="Trazado 743" transform="translate(.141 .162)"></path></g></g></svg>';
    echo        '<span><a href="https://canalla.agency" target="_blank">By Cnll</a></span>';
    echo    '</p>';
    echo '</div>';
} 


function fau_login_theme_style() {

  if(get_option( 'fau_primary_color') != ""):
    $fau_primary    = get_option( 'fau_primary_color');
  else :
    $fau_primary    = "#3498db";
  endif;
  if(get_option( 'fau_secondary_color') != ""):
    $fau_secondary  = get_option( 'fau_secondary_color');
  else :
    $fau_secondary    = "#2581bf";
  endif;

  wp_enqueue_style(
    'fau-login-style',
    my_canalla_settings_url() . '/css/styles_login.css'
	);

  $login_css = "
    body, html {
      background: {$fau_primary};
    }
  ";
  wp_add_inline_style( 'fau-login-style', $login_css );
}
add_action( 'login_enqueue_scripts', 'fau_login_theme_style' );

function fau_admin_bar_theme_style() {

  if(get_option( 'fau_primary_color') != ""):
    $fau_primary    = get_option( 'fau_primary_color');
  else :
    $fau_primary    = "#3498db";
  endif;
  if(get_option( 'fau_secondary_color') != ""):
    $fau_secondary  = get_option( 'fau_secondary_color');
  else :
    $fau_secondary    = "#2581bf";
  endif;

  wp_enqueue_style(
		'fau-admin-bar-style',
		my_canalla_settings_url() . '/css/styles_adminbar.css'
	);

  $admin_bar_css = "

    #wpadminbar {
      background: {$fau_primary};
    }

    #wpadminbar .menupop .ab-sub-wrapper,#wpadminbar .shortlink-input {
      background: {$fau_primary};
    }

  ";
  wp_add_inline_style( 'fau-admin-bar-style', $admin_bar_css );
}
add_action( 'admin_enqueue_scripts', 'fau_admin_bar_theme_style' );

function fau_admin_theme_style() {

  if(get_option( 'fau_primary_color') != ""):
    $fau_primary    = get_option( 'fau_primary_color');
  else :
    $fau_primary    = "#ea4d5d";
  endif;
  if(get_option( 'fau_secondary_color') != ""):
    $fau_secondary  = get_option( 'fau_secondary_color');
  else :
    $fau_secondary    = "#ff7c8a";
  endif;

  wp_enqueue_style(
		'fau-admin-style',
		my_canalla_settings_url() . '/css/styles_admin.css'
	);

  $admin_css = "

    a,
    input[type=checkbox]:checked:before,
    .view-switch a.current:before {
      color: {$fau_primary}
    }

    a:hover {
      color: {$fau_secondary}
    }

    #adminmenu li a:focus div.wp-menu-image:before,#adminmenu li.opensub div.wp-menu-image:before,#adminmenu li:hover div.wp-menu-image:before {
      color:  {$fau_primary}!important;
    }

    #adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head,#adminmenu .wp-menu-arrow,#adminmenu .wp-menu-arrow div,#adminmenu li.current a.menu-top,#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu,.folded #adminmenu li.current.menu-top,.folded #adminmenu li.wp-has-current-submenu,/* Hover actions */
    #adminmenu li.menu-top:hover,#adminmenu li.opensub>a.menu-top,#adminmenu li>a.menu-top:focus {
      background: {$fau_primary};
      background:#FFF
    }

    #adminmenu .opensub .wp-submenu li.current a,#adminmenu .wp-submenu li.current,#adminmenu .wp-submenu li.current a,#adminmenu .wp-submenu li.current a:focus,#adminmenu .wp-submenu li.current a:hover,#adminmenu a.wp-has-current-submenu:focus+.wp-submenu li.current a,#adminmenu .wp-submenu .wp-submenu-head,/* Dashicons */
    #adminmenu .current div.wp-menu-image:before,#adminmenu .wp-has-current-submenu div.wp-menu-image:before,#adminmenu a.current:hover div.wp-menu-image:before,#adminmenu a.wp-has-current-submenu:hover div.wp-menu-image:before,#adminmenu li.wp-has-current-submenu:hover div.wp-menu-image:before, #adminmenu li:hover div.wp-menu-image:before {
      color: {$fau_primary}
    }

    #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu div.wp-menu-name {
      color: {$fau_primary}
    }

    .wrap .add-new-h2,.wrap .add-new-h2:active {
      background: {$fau_primary};
    }

    .wrap .add-new-h2:hover {
      background: {$fau_secondary}
    }

    div.updated {
      border-left: 5px solid  {$fau_primary};
    }

    #adminmenu li a.wp-has-current-submenu .update-plugins,
    #adminmenu li.current a .awaiting-mod {
      background-color: {$fau_primary};
    }

    .wp-core-ui .button:hover,.wp-core-ui .button-secondary:hover,.wp-core-ui .button-primary {
      background: {$fau_primary};
    }

    .wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover {
      background: {$fau_secondary};
    }

    .composer-switch a,.composer-switch a:visited,.composer-switch a.wpb_switch-to-front-composer,.composer-switch a:visited.wpb_switch-to-front-composer,.composer-switch .logo-icon {
      background-color: {$fau_primary}!important
    }

    .composer-switch .vc-spacer, .composer-switch a.wpb_switch-to-composer:hover, .composer-switch a:visited.wpb_switch-to-composer:hover, .composer-switch a.wpb_switch-to-front-composer:hover, .composer-switch a:visited.wpb_switch-to-front-composer:hover {
      background-color:  {$fau_secondary}!important
    }

  ";
  wp_add_inline_style( 'fau-admin-style', $admin_css );
}
add_action( 'admin_enqueue_scripts', 'fau_admin_theme_style' );

// Update Admin Footer
function fau_swap_footer_admin() {
  echo '<a style="ttext-decoration: none;
    font-weight: 600;" href="http://canalla.agency/" target="_blank">By Cnll</a></p>';
}
add_filter( 'admin_footer_text', 'fau_swap_footer_admin' );

function my_login_logo() { ?>
<style type="text/css">
  #login h1 a,
  .login h1 a {
     background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg');
    background-size: contain;
    margin-bottom: 30px;
    background-position: center;
    width: unset;
  }
</style>
<!--<script>-->
<!--      if(localStorage.getItem("image_logo") != ''){-->
<!--        var image_url_local = localStorage.getItem("image_logo");-->
<!--      }else{-->
<!--        var image_url_local = 'wp-content/plugins/canalla/inc/logo.svg';-->
<!--      }-->
<!--      var hoja = document.createElement('style')-->
<!--      hoja.innerHTML = "#login h1 a, .login h1 a {background-image: url('"+image_url_local+"');}";-->
<!--      document.head.appendChild(hoja);-->
<!--  </script>-->
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
// Remove default HTML height on the admin bar callback
function fui_admin_bar_style() {
  if ( is_admin_bar_showing() ) {
?>
<style type="text/css" media="screen">
  html {
    margin-top: 46px !important;
  }

  * html body {
    margin-top: 46px !important;
  }
</style>
<?php } }
add_theme_support( 'admin-bar', array( 'callback' => 'fui_admin_bar_style' ) );
?>