<?php
/**
 * Custom functions
 */

if (class_exists('bbPress')) {
    add_action( 'wp_print_styles', 'deregister_bbpress_styles', 15 );
    function deregister_bbpress_styles() {
      wp_deregister_style( 'bbp-default' );
    }
    wp_enqueue_style( 'bbpress_css', plugins_url().'/bbpress/templates/default/css/bbpress.min.css');
}

function short_freshness_time( $output) {
    $pattern = array(
        '/ year/',
        '/ years/',
        '/ month/',
        '/ months/',
        '/ week/',
        '/ weeks/',
        '/ day/',
        '/ days/',
        '/ hour/',
        '/ hours/',
        '/ minute/',
        '/ minutes/',
        '/ second/',
        '/ seconds/',
        '/ ago/'
        );
    $result_pattern = array('y','y','m','m','s','s','j','j','h','h','min','min','sec','sec','');
    $output = preg_replace( $pattern, $result_pattern, $output );
    $output = preg_replace( '/,/', '', $output );
    $output = preg_replace( '%s(?!.*s.*)%', ' ', $output );
    $output = preg_replace( '/s /', ' ', $output );
    return $output;
}
add_filter( 'bbp_get_time_since', 'short_freshness_time' );
add_filter('bp_core_time_since', 'short_freshness_time');

function user_info($data){
    $current_user = wp_get_current_user();

    if($data == "username"){
        $value = $current_user->user_login;
    }
    elseif($data == "email"){
        $value = $current_user->user_email;
    }
    elseif($data == "firstname"){
        $value = $current_user->user_firstname;
    }
    elseif($data == "lastname"){
        $value = $current_user->user_lastname;
    }
    elseif($data == "displayname"){
        $value = $current_user->display_name;
    }

    echo $value;
}

function custom_login_form(){
    $args = array(
        'redirect' => get_permalink(), 
        'form_id' => 'loginform-custom',
        'label_username' => __( 'Username custom text' ),
        'label_password' => __( 'Password custom text' ),
        'label_remember' => __( 'Remember Me custom text' ),
        'label_log_in' => __( 'Log In custom text' ),
        'remember' => true
    );
    return wp_login_form( $args );
}

function custom_register_form(){
 
    $reg_form = do_action('register_form');
    $register = $_GET['register']; 
    if($register == true) {       
        $reg_form = $reg_form.'<p>Vérifiez votre email pour avoir votre mot de passe!</p>';
    }
    $reg_form = $reg_form.'<input type="hidden" name="redirect_to" value="'.$_SERVER['REQUEST_URI'].'?register=true" />';
    $reg_form = $reg_form.'<input type="hidden" name="user-cookie" value="1" />';

    echo $reg_form;
}

