<?php

/*
Handles the caching optimizations
*/

function incloudCaching() {

    //prefetch
    //$precacheActive = AdminPageFramework::getOption( 'InCloudTools', 'precacheActive', false );
    $sData = get_option( 'InCloudTools', array() );
    $precacheActive = (isset($sData['precacheActive']) ? $sData['precacheActive'] : false);
    

    if($precacheActive){
        //include the script
        wp_enqueue_script('quicklinks_script', plugin_dir_url( __FILE__ ) . 'js/quicklink.umd.js', array(), '1.0.1');
        add_action('wp_footer', 'incloud_caching_throttle_script');
    }
}

add_action('init', 'incloudCaching');



function incloud_caching_throttle_script(){
    //only do precaching if not logged in.
    if (!is_user_logged_in()){
        //get value from options
        $sData = get_option( 'InCloudTools', array() );
        $throttle = (isset($sData['precacheThrottle']) ? $sData['precacheThrottle'] : 5);
        $exclude = explode(",",(isset($sData['precacheExclude']) ? $sData['precacheExclude'] : ''));
        echo "<script> window.addEventListener('load', () =>{ quicklink.listen({
            timeout: 4000,
            throttle: {$throttle},
            ignores: [
                uri => uri.includes('wp-admin'),
                uri => uri.includes('kurv'),
                uri => uri.includes('kasse'),
                uri => uri.includes('min-konto'),
                uri => uri.includes('remove'),
                uri => uri.includes('checkout'),
                uri => uri.includes('my-account'),
                uri => uri.includes('basket'),
                uri => uri.includes('cart'),
                uri => uri.includes('add-to-cart'),          
                "; 
                if($exclude[0] != ''){
                    foreach( $exclude as $url){
                        echo "uri => uri.includes('{$url}'),";
                    }
                }
        echo "],
        }); });</script>";
    }
}

