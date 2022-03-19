<?php

/* 
    Plugin Name:    InCloud Tools
    Plugin URI:     https://incloud.dk/incloud-tools/
    Description:    Tilføjer funktioner til WordPress der kører på InCloud hosting
    Author:         Brian Andersen
    Author URI:     https://incloud.dk
    Version:        1.2.0
    Requirements:   InCloud Hosting https://incloud.dk
*/

include( dirname( __FILE__ ) . '/library/apf/admin-page-framework.php' );

include( dirname( __FILE__ ) . '/admin/incloud-admin-page.php' );

include( dirname( __FILE__ ) . '/public/incloud-public-page.php' );


$sData = get_option( 'InCloudTools', array() );
$betaversion = (isset($sData['betaversion']) ? $sData['betaversion'] : false);


if($betaversion){
    //plugin updater
    include( dirname( __FILE__ ) . '/library/plugin-update-checker-4.9/plugin-update-checker.php' );
    $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
        'https://tools.incloud.dk/plugin/beta.json',
        dirname( __FILE__ ) . '/incloud.php', //Full path to the main plugin file or functions.php.
        'incloud'
    );
}
else {
    //plugin updater
    include( dirname( __FILE__ ) . '/library/plugin-update-checker-4.9/plugin-update-checker.php' );
    $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
        'https://tools.incloud.dk/plugin/stable.json',
        dirname( __FILE__ ) . '/incloud.php', //Full path to the main plugin file or functions.php.
        'incloud'
    );
}

/*
** Removed version 1.2.0

//Rest api bench
function rest_bench( $data ) {
    include( dirname( __FILE__ ) . '/library/bench/bench-class.php' );
    $result = benchmark::run();
    return json_encode($result);
  }
add_action( 'rest_api_init', function () {
    register_rest_route( 'incloud/v1', '/bench', array(
      'methods' => 'GET',
      'callback' => 'rest_bench',
    ) );
  } );
*/