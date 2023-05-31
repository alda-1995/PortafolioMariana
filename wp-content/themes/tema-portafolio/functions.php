<?php 
    if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

    //The code below remove the scripts from head and add them in footer
    function remove_head_scripts() {
        remove_action('wp_head', 'wp_print_scripts');
        remove_action('wp_head', 'wp_print_head_scripts', 9);
        remove_action('wp_head', 'wp_enqueue_scripts', 1);
        
        add_action('wp_footer', 'wp_print_scripts', 5);
        add_action('wp_footer', 'wp_enqueue_scripts', 5);
        add_action('wp_footer', 'wp_print_head_scripts', 5);
    }
    add_action('wp_enqueue_scripts', 'remove_head_scripts');

    // //Eliminar atributos type en etiquetas scripts y style
    add_action('wp_loaded', 'output_buffer_start');
    
    function output_buffer_start() { 
        ob_start("output_callback"); 
    }
    add_action('shutdown', 'output_buffer_end');
    
    function output_buffer_end() { 
    if (ob_get_length() > 0) { ob_end_clean();}
    }

    function output_callback($buffer) {
        return preg_replace( "%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $buffer );
    }
    # Oculta Adminbar
    show_admin_bar(false);
    # Remueve WP Version   
    function wpbeginner_remove_version() {
        return '';
    } 
    add_filter('the_generator', 'wpbeginner_remove_version');

    # Add Thumbnails Support
    add_theme_support( 'post-thumbnails'); 

    # Add Feed Links Support
    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 
        'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            )
        );

    # URL Template
    function theme_url() {
        echo get_template_directory_uri();
    }
    function get_theme_url(){
        return get_template_directory_uri();
    }
    # URL Blog
    function blog_url() {
        echo bloginfo('url');
    }
    function get_blog_url(){
        return bloginfo('url');
    }
    function vince_check_active_menu( $menu_item ) {
        $actual_link = ( isset( $_SERVER['HTTPS'] ) ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if ( $actual_link == $menu_item->url ) {
            return 'is-active';
        }
        return '';
    }

    function telCorrect($tel){
        $tel = trim($tel);
        $tel = str_replace('(','',$tel);
        $tel = str_replace(')','',$tel);
        $tel = str_replace('-','',$tel);
        $tel = str_replace(' ','',$tel);
        return $tel;
    }
    function imagenesAlt($image){
        if($image["alt"]){
            return $image["alt"];
        }else if($image["description"]){
            return $image["description"];
        }else{
            return $image["title"];
        }
    }
    function get_active_menu_static( $url ) {
        $actual_link = ( isset( $_SERVER['HTTPS'] ) ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if ( $actual_link == $url ) {
            return 'is-active';
        }
        return '';
    }
    # Enqueue Frontend Styles
    add_action( 'wp_enqueue_scripts', 'load_css_frames' );
    function load_css_frames() {
        //NORMALIZE  CSS
        wp_enqueue_style('normalize-css',get_template_directory_uri() . "/assets/styles/css/normalize.css", array(), '', '');
        //Bootstrap
        wp_enqueue_style('bootstrap-css', "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css", array(), '', '');
        //hamburguer css
        wp_enqueue_style('hamburgers',get_template_directory_uri() . "/assets/styles/css/hamburgers.min.css", array(), '', '');
        //Swiper css
        wp_enqueue_style('swiper-css',get_template_directory_uri() . "/assets/styles/css/swiper.min.css", array(), '', '');
        //Style Theme
        wp_enqueue_style('style',get_template_directory_uri() . "/assets/styles/css/main.css", array(), '', '');
    }
    # Enqueue Frontend Styles
    add_action( 'wp_enqueue_scripts', 'load_scripts_frames' );
    function load_scripts_frames() {
        //Jquery
        wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), '', '');
        wp_enqueue_script('jquery-validate', get_template_directory_uri() . '/assets/js/jquery.validate.min.js', array(), '', 'jquery' );
        wp_enqueue_script('additional-methods', get_template_directory_uri() . '/assets/js/additional-methods.js', array(), '', 'jquery' );
        //Pagination js
        wp_enqueue_script('Pagination', get_template_directory_uri() . '/assets/js/jPages.js', array(), '', 'jquery' );
        //Bootstrap JS
        wp_enqueue_script('Bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), '', 'jquery' );
        //Swiper JS
        wp_enqueue_script('Swiper', get_template_directory_uri() . '/assets/js/swiper.min.js', array(), '', 'jquery' );
        // GREENSOCK
        wp_enqueue_script('gsap', get_template_directory_uri() . '/assets/js/gsap.min.js', '', 'jquery');
        //main global js
        wp_enqueue_script('script', get_template_directory_uri() . "/assets/js/main.js", array(), '', 'jquery');
        wp_localize_script( 'script', 'aj_ajax', array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'aj_nonce' => wp_create_nonce('aj-nonce')
        ));
    }

    // require_once (get_stylesheet_directory() . '/requets/filterPeopleRegion.php');
    // require_once (get_stylesheet_directory() . '/requets/filterProyects.php');
    // require_once (get_stylesheet_directory() . '/requets/getDataProyects.php');

    // function add_ajax_actions() {
    //     add_action( 'wp_ajax_actionFiltraGenteRegion', 'filterPeople' );
    //     add_action( 'wp_ajax_nopriv_actionFiltraGenteRegion', 'filterPeople' );
    // }
    // add_action( 'admin_init', 'add_ajax_actions' );

    # Remueve Welcome Widget from the Dashboard
    function remove_dashboard_widgets() {
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
    }
    add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );
    remove_action( 'welcome_panel', 'wp_welcome_panel' );
    # Agrega Canalla Plugin Styles
    define( 'MY_CANALLA_PATH', get_stylesheet_directory() . '/assets/inc/plugins/canalla/' );
    define( 'MY_CANALLA_URL', get_stylesheet_directory_uri() . '/assets/inc/plugins/canalla/' );
    include_once( MY_CANALLA_PATH . 'admin-ui.php' );
    // Customize the url setting to fix incorrect asset URLs.
    add_filter('canalla/settings/url', 'my_canalla_settings_url');
    function my_canalla_settings_url() {
        return MY_CANALLA_URL;
    }
    # Guarda y sincroniza ACF FILES
    function my_acf_json_save_point( $path ) {
        $path = get_stylesheet_directory() . '/assets/inc/acfCustom/';
        return $path;
    }
    add_filter('acf/settings/save_json', 'my_acf_json_save_point');
    function my_acf_json_load_point( $paths ) {
        unset($paths[0]);
        $paths[] = get_stylesheet_directory() . '/assets/inc/acfCustom/';
        return $paths;
    }
    add_filter('acf/settings/load_json', 'my_acf_json_load_point');
    // # Oculta elementos del menú START
    // function remove_menu_elements() {
    //     $userData = wp_get_current_user();
    //     if($userData->data->user_login != 'AdminTI'){
    //         //remove_menu_page( 'index.php' );                  //Dashboard
    //         remove_menu_page( 'edit.php' );                   //Posts
    //         remove_menu_page( 'upload.php' );                 //Media
    //         //remove_menu_page( 'edit.php?post_type=page' );    //Pages
    //         remove_menu_page( 'edit-comments.php' );          //Comments
    //         remove_menu_page( 'themes.php' );                 //Appearance
    //         remove_menu_page( 'plugins.php' );                //Plugins
    //         remove_menu_page( 'users.php' );                  //Users
    //         remove_menu_page( 'tools.php' );                  //Tools
    //         remove_menu_page( 'tools.php' );                  //Tools
    //         // remove_menu_page( 'profile.php' );                  //Profile
    //         //   remove_menu_page( 'options-general.php' );        //Settings
    
    //     }
    // }
    // add_action( 'admin_menu', 'remove_menu_elements' );
    // $userData = wp_get_current_user();
    // if($userData->data->user_login != 'AdminTI'){
    //     //Oculta custom fields
    //     add_filter('acf/settings/show_admin', '__return_false');
    // }

    #SMK
    include 'assets/inc/smk.php';
    # Protect WordPress Against Malicious URL Requests Plugin
    include_once( get_stylesheet_directory() . '/assets/inc/security.php' );

    require('assets/inc/acf/option-page/settings.php');
    // include 'assets/inc/cpt/proyects.php';

    //tax
    // include 'assets/inc/tax/tax_region.php';
    // include 'assets/inc/tax/tax_location.php';
    // include 'assets/inc/tax/tax_year.php';
    //Agrega ACF en rest api//////////////////////////////////////////////////////////////
    function create_ACF_meta_in_REST() {
        $postypes_to_exclude = ['acf-field-group','acf-field'];
        $extra_postypes_to_include = ["page"];
        $post_types = array_diff(get_post_types(["_builtin" => false], 'names'),$postypes_to_exclude);

        array_push($post_types, $extra_postypes_to_include);

        foreach ($post_types as $post_type) {
            register_rest_field( $post_type, 'acf', [
                'get_callback'    => 'expose_ACF_fields',
                'schema'          => null,
            ]
            );
        }

    }

    function expose_ACF_fields( $object ) {
        $ID = $object['id'];
        return get_fields($ID);
    }

    add_action( 'rest_api_init', 'create_ACF_meta_in_REST' );
    /////////////////////////////////////////////////////////////////////////////////////////

    // // SMTP Authentication
    // function send_smtp_email( $phpmailer ) {
    //    $phpmailer->isSMTP();
    //    $phpmailer->Host = 'g5tv-gf7f.accessdomain.com';
    //    $phpmailer->Port = 465; // could be different
    //    $phpmailer->SMTPDebug = 0;
    //    $phpmailer->Username = 'mailing@canalla.agency'; // if required
    //    $phpmailer->Password = 'M5b#C]fc!2p'; // if required
    //    $phpmailer->SMTPAuth = true; // if required
    //    $phpmailer->SMTPSecure = 'ssl'; // enable if required, 'tls' is another possible value
    //    $phpmailer->From = 'no-reply@rsaaw.com';
    //    $phpmailer->FromName = 'Formulario de contacto - RSAAW';
    // }
    // add_action( 'phpmailer_init', 'send_smtp_email' );

    function sendContacto(){
        // $formulario = $_POST['formulario'];
        // $name = ($formulario['name']) ? $formulario['name'] : "";
        // $email = ($formulario['email']) ? $formulario['email'] : "";
        // $subject = ($formulario['filterSubject']) ? $formulario['filterSubject'] : "";
        // $message = ($formulario['message']) ? $formulario['message'] : "";
        // $blockFooter = get_field('block_footer', 'option');
        // $subjects = $blockFooter['subjets'];
        // $url = get_template_directory_uri().'/mail-contacto.php';
        // $ch = curl_init();
        // curl_setopt ($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, 'name='.$name.'&email='.$email.'&subject='.$subject.'&message='.$message);
        // curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
        // curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        // $contents = curl_exec($ch);
        // if (curl_errno($ch)) {
        // echo curl_error($ch);
        // echo "\n<br />";
        // $contents = '';
        // } else {
        // curl_close($ch);
        // }
        // if (!is_string($contents) || !strlen($contents)) {
        //     // echo "Failed to get contents.";
        //     $contents = '';
        // }
        // $correoSend = array();
        // foreach ($subjects as $sub) {
        //     $titleSub = $sub['subject'];
        //     $emailSubject = $sub['emails'];
        //     if($titleSub == $subject && !empty($emailSubject)){
        //         foreach ($emailSubject as $correoSubject) {
        //             $correoSend[] = $correoSubject['email'];
        //         }
        //         break;
        //     }
        // }

        // $response = array();
        // $body = $contents;
        // $multiple_recipients = implode(', ', $correoSend);
        // $subject = 'Contact Form - RSAAW';
        // $headers = array('Content-Type: text/html; charset=UTF-8');
        // $result = wp_mail($multiple_recipients, $subject, $body, $headers);
        // //se guarda la info independiente del si se envio o no
        // date_default_timezone_set("America/Mexico_City");
        // $fecha = date("Y-m-d H:i:s");
        // //code insert
        // global $user_ID;
        // $new_post = array(
        //     'post_title' => $name,
        //     'post_status' => 'publish',
        //     'post_date' => $fecha,
        //     'post_author' => $user_ID,
        //     'post_type' => 'emails-contact'
        // );
        // $post_id = wp_insert_post($new_post);
        // if($post_id){
        //     update_field('email', $email, $post_id);
        //     update_field('subject', $subject, $post_id);
        //     update_field('message', $message, $post_id);
        // }
        // if ($result) {
        //     $response = array('code' => "success");
        //     print_r(json_encode($response));
        // }else{
        //     $response = array('code' => "error");
        //     print_r(json_encode($response));
        // }
        // die();
    }
