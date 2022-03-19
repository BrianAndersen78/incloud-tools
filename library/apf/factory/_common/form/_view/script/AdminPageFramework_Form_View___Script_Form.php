<?php 
/**
	Admin Page Framework v3.8.20 by Michael Uno 
	Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
	<http://en.michaeluno.jp/InCloud>
	Copyright (c) 2013-2019, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT> */
class InCloudAdminPageFramework_Form_View___Script_Form extends InCloudAdminPageFramework_Form_View___Script_Base {
    static public function getScript() {
        return <<<JAVASCRIPTS
( function( $ ) {

    var _removeInCloudAdminPageFrameworkLoadingOutputs = function() {

        jQuery( '.InCloud-form-loading' ).remove();
        jQuery( '.InCloud-form-js-on' )
            .hide()
            .css( 'visibility', 'visible' )
            .fadeIn( 200 )
            .removeClass( '.InCloud-form-js-on' );
    
    }

    /**
     * When some plugins or themes have JavaScript errors and the script execution gets stopped,
     * remove the style that shows "Loading...".
     */
    var _oneerror = window.onerror;
    window.onerror = function(){
        
        // We need to show the form.
        _removeInCloudAdminPageFrameworkLoadingOutputs();
        
        // Restore the original
        window.onerror = _oneerror;
        
        // If the original object is a function, execute it;
        // otherwise, discontinue the script execution and show the error message in the console.
        return "function" === typeof _oneerror
            ? _oneerror()      
            : false; 
       
    }
    
    /**
     * Rendering forms is heavy and unformatted layouts will be hidden with a script embedded in the head tag.
     * Now when the document is ready, restore that visibility state so that the form will appear.
     */
    jQuery( document ).ready( function() {
        _removeInCloudAdminPageFrameworkLoadingOutputs();
    });    

    /**
     * Gets triggered when a widget of the framework is saved.
     * @since    3.7.0
     */
    $( document ).bind( 'InCloud_saved_widget', function( event, oWidget ){
        jQuery( '.InCloud-form-loading' ).remove();
    });    
    
}( jQuery ));
JAVASCRIPTS;
        
    }
    static private $_bLoadedTabEnablerScript = false;
    }
    