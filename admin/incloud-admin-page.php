<?php


if ( ! class_exists( 'InCloudAdminPageFramework' ) ) {
    return;
}


class InCloudTools extends InCloudAdminPageFramework {
    public function start_InCloudTools() {

        $sClassName = get_class( $this );

        if (! class_exists('InCloudAceCustomFieldType'))
            include_once(dirname( __FILE__ ) . '/library/apf/custom-field-types/ace-custom-field-type/AceCustomFieldType.php');
        new InCloudAceCustomFieldType( $sClassName );

        if (! class_exists('InCloudNoUISliderCustomFieldType'))
            include_once(dirname( __FILE__ ) . '/library/apf/custom-field-types/nouislider-custom-field-type/InCloudNoUISliderCustomFieldType.php');
        new InCloudNoUISliderCustomFieldType( $sClassName );

        if (! class_exists('InCloudToggleCustomFieldType'))
            include_once(dirname( __FILE__ ) . '/library/apf/custom-field-types/toggle-custom-field-type/ToggleCustomFieldType.php');
        new InCloudToggleCustomFieldType( $sClassName );
    }
    
    public function setUp() {
                   
        // Create the root menu
        $this->setRootMenuPage(
            'InCloud Tools',    // specify the name of the page group
            'dashicons-welcome-learn-more'   // menu icon
        );   
                           
        // Add the sub menu item
        $this->addSubMenuItems(   
            array(
                'title'         => 'InCloud tools',        // page title
                'page_slug'     => 'incloudtools',    // page slug
                'menu_icon'     => 'dashicons-welcome-learn-more'      // page screen icon for WP 3.7.x or below
            )        
        );  
        
        // Add in-page tabs
        $this->addInPageTabs(
            'incloudtools',    // set the target page slug so that the 'page_slug' key can be omitted from the next continuing in-page tab arrays.
            array(
                'tab_slug'  =>    'intro',    // avoid hyphen(dash), dots, and white spaces
                'title'     =>    __( 'Intro', 'intro' ),
            ),  
            array(
                'tab_slug'  =>    'caching',    // avoid hyphen(dash), dots, and white spaces
                'title'     =>    __( 'Straksvisning', 'caching' ),
            ),
            array(
                'tab_slug'  =>    'pingserver',    // avoid hyphen(dash), dots, and white spaces
                'title'     =>    __( 'Svartider', 'svartider' ),
            ), 
            array(
                'tab_slug'  =>    'permission',    // avoid hyphen(dash), dots, and white spaces
                'title'     =>    __( 'Tilladelser', 'tilladelser' ),
            ),   
            array(
                'tab_slug'  =>    'version',    // avoid hyphen(dash), dots, and white spaces
                'title'     =>    __( 'Version', 'version' ),
            )         
            
        );    
 
        $this->setPageHeadingTabsVisibility( false );    // disables the page heading tabs by passing false.
        $this->setInPageTabTag( 'h2' );        // sets the tag used for in-page tabs
        
    }
    
   
    
    /**
     * ------------------ Intro page -------------------------
     */

    public function content_top_incloudtools_intro( $sContent ) {      
        return $sContent 
            . '<div style="background-color:white;padding:30px;"><h2>Værktøj til at forbedre oplevelsen på InCloud-hosting</h2>'
            . '<p>Med dette plugin kan du tilføje en række værktøjer til din WordPress-side. <br/> <strong>BEMÆRK: Læs vejledningerne under hver optimeringspunkt grundigt! Specielt hvis denne side ikke er på InCloud hosting, kan du lægge din side ned ved forkert konfigurering.</strong></p>'
            . '<br/><h3>Straksvisning</h3><p>Brug værktøjerne på denne side, til at få din side til at svare lynhurtigt på besøg. Det tager ca. 5 minutter at gå punkterne i gennem og indstille de nødvendige konfigurationer. Din side bør efterfølgende vises på 200-500ms.</p>'
            . '<h3>Svartider</h3><p>Brug graferne på denne side, til at se dine svartider fra serveren.</p>'
            . '<h3>Tilladelser</h3><p>Giv InCloud support-personel tilladelse, til proaktivt at være behjælpelig med optimering af din side.</p>'
            . '<h3>Version</h3><p>Vælg om du vil følge den stabile version eller beta version for opdateringer af InCloud Tools.</p>'
            . '</div>'
            ; 
    }

    //----------------Straksvisning--------------------

    //Add test
    public function content_top_incloudtools_caching( $sContent ) {      
        return $sContent 
            . '<div style="background-color:white;padding:30px;"><h2>Straksvisning</h2>'
            . '<h3>1) Aktivere prefetch</h3>'
            . '<p>Denne funktion er IKKE ordentlig testet på webshops. Vi anbefaler indtil videre ikke at aktivere på webshops.</p>'
            . '<p>Sider der ikke er html-cachet, bør undtages fra prefetch.</p>';
            
    }

    //bottom
    public function content_bottom_incloudtools_caching( $sContent ){
        $serverpath = '/usr/bin/php74 -q ' . str_replace('/wp-admin','/wp-cron.php',getcwd());
        $siteurl = get_site_url();
        return $sContent
            . '<h3>2) Aktiver server cron hvert 5 minut</h3>'
            . '<p>Ved at flytte WordPress vedligeholdelsesopgaver til serverniveau, sikrer vi hurtig visning af forsiden. Du kender måske det, at en ikke så besøgt side, kan være 10 - 15 sekunder om at vise forsiden, når du går ind på den. Det forhindrer vi ved denne konfigurering.</p>'
            . '<p>Nedenfor er angivet dine kommandoer for denne side. Har du brug for det kan du læse detaljeret vejledning <a href="https://incloud.dk/cron-scheduled-tasks-paa-incloud-hosting/">her</a>.</p>'
            . "<p>Din cron-kommando specifikt til dette website:<strong> $serverpath </strong></p>"
            . "<p>Valgfri kode til wp-config:<strong> define( 'DISABLE_WP_CRON', true ); </strong></p>"
            . "<p>Bemærk: Er din side ikke på InCloud hosting, kan den første del af din cron-kommando være anderledes. Spørg evt din host om korrekt php-path.</p>"
            . '<h3>3) Sikre StackCache har cachet forsiden</h3>'
            . '<p>Vores page caching i StackCache bliver slettet ved de mindste ændringer i WordPress. Det kan være en baggrundsopdatering, et køb i en webshop, en kommentar på et indlæg med mere.</p>'
            . '<p>For at sikre os, at forsiden altid er cachet, får vi vores server til at hente siden en gang hvert 5. minut. Det vil tricke StackCache til at opdatere cachen for forsiden, hvis den ikke allerede er det.</p>'
            . '<p>Aktiver pingserveren på næste side ( under svartider )</p>'
            //. "<p>Kode til cron:<strong> wget $siteurl > /dev/null </strong></p>"
            . '</div>';
    }

    //The form
    public function load_incloudtools_caching( $oAdminPage ) {
        
        $this->addSettingFields(
            array( 
                'field_id'      => 'precacheActive',
                'type'          => 'toggle', 
                'options'       => array( 
                    'width' => 100, 
                    'height' => 40, 
                ),                  
                'title'         => 'Aktiver prefetch',
                'description'   => 'Aktiver prefetch script. Dette gør at dine undersider loader øjeblikkeligt, da indholdet allerede er hentet.',       
            ),
            array( 
                'field_id'      => 'precacheThrottle',
                'type'          => 'no_ui_slider', 
                'default'       => 5, 
                'options'       => array( 
                    'step'  => 1, 
                    'round' => 0, 
                    'start' => array( 
                        5, 
                    ), 
                ),  
                'title'         => 'Antal samtidige hentninger',
                'description'   => 'Jo højere værdi, jo flere sider vil den besøgenes browser forsøge at prefetche samtidig. For høj værdi kan give 503 fejl på hjemmesiden. 5 er som udgangspunkt en god værdi på ikke-webshops og på InCloud hosting. Er dette en webshop er anbefalet værdi 1. Ligger denne side ikke på InCloud hosting, er anbefalet værdi 1.',    
            ),
            
            array(    
                'field_id'      => 'precacheExclude',
                'type'          => 'text',
                'title'         => 'Undtagelser',
                'description'   => 'Er denne side en webshop, skal du indtaste URL på indkøbskurven, checkout og min-konto siden adskilt med komma. Du kan også bruge feltet til at eksludere andre sider fra prefetch, hvis du ønsker det. Indtastninger skal være adskilt med komma, og kan være del af URL. eksempel: <strong>cart,checkout,my-account</strong>',   
            ),
            
             
            array( // Submit button
                'field_id'      => 'submit_caching',
                'type'          => 'submit',
                'value'         => 'Gem',
            )   
        );    
           
        
    }

    /**
     * ------------------ Pingserver / svartider -------------------------
     */

    private function getStatus(){
        //get accesskey from saved values
        $sData = get_option( 'InCloudTools', array() );
        $accesskey = (isset($sData['accesskey']) ? $sData['accesskey'] : ''); 
        //
        $url = 'https://'.$_SERVER['SERVER_NAME'];
        $posturl= 'https://pingserver.incloud.dk/api/status.php';
        $ch=curl_init();
        $timeout=5;

        curl_setopt($ch, CURLOPT_URL, $posturl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"url={$url}&key={$accesskey}");

        // Get URL content
        $lines_string=curl_exec($ch);
        // close handle to release resources
        curl_close($ch);
        //output, you can also save it locally on the server
        return $lines_string;
    }

    public function content_top_incloudtools_pingserver( $sContent ) {    
        $sContent .= 
            '<div style="background-color:white;padding:30px;"><h2>Vores pingserver måler svartider på forsiden, og sørger for at holde cachen opdateret.</h2>'
            . '<p><strong>Pingserver status: </strong>'. $this->getStatus() .'</p>'
            . ''
            ; 
        
        $status = $this->getStatus();
        if($status == 'Started'){
            $sContent .= $this->displaySpeedGraphs();
        }

        return $sContent;
            
    }

    //The form
    public function load_incloudtools_pingserver( $oAdminPage ) {
        $status = $this->getStatus();
        if($status == 'Started' || $status == 'Stopped'){
            
        }
        else{
            $this->addSettingFields(
                array( 
                    'field_id'      => 'accesskey',
                    'type'          => 'text',                 
                    'title'         => 'Access-key',
                    'default'       =>  md5(uniqid()),
                    'description'   => 'Hvis dette er en reinstallation, kan du bruge gammel access-key for at beholde statestik. Ellers brug forslået værdi.',       
                ),
                 
                array( // Submit button
                    'field_id'      => 'submitregisterpingserver',
                    'type'          => 'submit',
                    'value'         => 'Registrer på pingserver',
                )   
            );    
        }
        
    }

    //Catch register at pingserver function
    public function submit_after_incloudtools_submitregisterpingserver() {
        //get accesskey from saved values
        $sData = get_option( 'InCloudTools', array() );
        $accesskey = (isset($sData['accesskey']) ? $sData['accesskey'] : ''); 
        if($accesskey != ''){
            //
            $url = 'https://'.$_SERVER['SERVER_NAME'];
            $posturl= 'https://pingserver.incloud.dk/api/register.php';
            $ch=curl_init();
            $timeout=5;

            curl_setopt($ch, CURLOPT_URL, $posturl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_POSTFIELDS,"url={$url}&key={$accesskey}");

            // Get URL content
            $lines_string=curl_exec($ch);
            // close handle to release resources
            curl_close($ch);
        }
    }
    //-----------------permissions--------------------

    public function content_top_incloudtools_permission( $sContent ) {      
        return $sContent 
            . '<div style="background-color:white;padding:30px;"><h2>Tilladelser</h2>'
            . '<p>Ved InCloud hosting overvåger vi ikke kun hastigheden af serverne, men også hastigheden af vores kunders WordPress installationer.</p>'
            . '<p>Hvis du giver tilladelse til det, vil vi proaktivt være behjælpelige med at holde din side top tunet. Hvis vi opdager din side er langsom, vil vi logge ind på siden og sikre os at cachen fungerer optimalt, og eventuelt give anbefalinger til plugins.</p>'
            . '<p>Vi ændre ikke på din sides indhold eller aktive plugins, men hvis vi finder destruktive plugins, lader vi dig det vide i en mail.</p>'
            . '<p>Hjælpen er gratis, og vi opretter selv bruger på WordPress installationen, men vi respekterer naturligvis, at der er kunder der ikke ønsker andre konfigurer deres WordPress installation.</p>'
            . '<p><strong>Bemærk:</strong> Vi giver ikke nødvendigvis besked, om at vi har været inde på din side. Kun i tilfælde af at vi har anbefalinger til plugins eller andre relevante beskeder, sender vi en mail til sidens admin.</p>';
            
    }


    //The form
    public function load_incloudtools_permission( $oAdminPage ) {
        
        $this->addSettingFields(
            array( 
                'field_id'      => 'permission',
                'type'          => 'toggle', 
                'options'       => array( 
                    'width' => 100, 
                    'height' => 40, 
                ),                  
                'title'         => 'Giv tilladelse',
                'description'   => 'Giv tilladelse til proaktiv hjælp på din side.',       
            ),
             
            array( // Submit button
                'field_id'      => 'submit_version',
                'type'          => 'submit',
                'value'         => 'Gem',
            )   
        );    
    }


    //-----------------version------------------------
    
    public function content_top_incloudtools_version( $sContent ) {      
        return $sContent 
            . '<div style="background-color:white;padding:30px;"><h2>Version</h2>'
            . '<p>InCloud Tools distribueres i 2 versioner. <br/><strong>Stable</strong> - der anbefales til alle live sider <br/><strong>Beta</strong> - der indeholder alle de nye funktioner, men ikke er gennemtestet endnu.</p>'
            . ''
            ; 
    }

    //The form
    public function load_incloudtools_version( $oAdminPage ) {
        
        $this->addSettingFields(
            array( 
                'field_id'      => 'betaversion',
                'type'          => 'toggle', 
                'options'       => array( 
                    'width' => 100, 
                    'height' => 40, 
                ),                  
                'title'         => 'Aktiver betakanal',
                'description'   => 'Beta bør ikke være aktiveret på live sider!',       
            ),
             
            array( // Submit button
                'field_id'      => 'submit_version',
                'type'          => 'submit',
                'value'         => 'Gem',
            )   
        );    
    }

    //----------------private functions------------------------------------------
    
    private function displaySpeedGraphs(){
        //get json
        //get accesskey from saved values
        $sData = get_option( 'InCloudTools', array() );
        $accesskey = (isset($sData['accesskey']) ? $sData['accesskey'] : ''); 
        if($accesskey != ''){
            //
            $url = 'https://'.$_SERVER['SERVER_NAME'];
            //tmp
            /*
            $url = 'https://blog.incloud.dk';
            $accesskey = '6226c334365d5b83aad3dc0e090a75d1';
            */
            
            $posturl= 'https://pingserver.incloud.dk/api/getdata.php';
            $interval = time()-(60*60*24*7);
            $ch=curl_init();
            $timeout=5;

            curl_setopt($ch, CURLOPT_URL, $posturl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_POSTFIELDS,"url={$url}&key={$accesskey}&interval={$interval}");

            // Get URL content
            $lines_string=curl_exec($ch);
            // close handle to release resources
            curl_close($ch);

        }
        //get latest phpversion
        $phpv = phpversion();
        $rvar = '<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.bundle.min.js?ver=1-0-12"></script>';
        $rvar .= "<script>var incloud_jsondata = {$lines_string};</script>";
        $rvar .= '<div style="height: 300px"><canvas id="canvas1"></canvas></div>';
        $rvar .= '<div style="height: 300px"><canvas id="canvas2"></canvas></div>';
        $rvar .= '<div style="height: 300px"><canvas id="canvas3"></canvas></div>';
        $rvar .= "<p>PHP-version: <span style='font-size: 40px;font-weight:800;'>{$phpv}</span></p>";
        $rvar .= '<script src="/wp-content/plugins/incloud/admin/js/charts.js"></script>';
        $rvar .= '<p><strong>Kort forklaring: </strong><br/>Første graf viser loadtid for forsiden med cache, og afspejler den hastighed dine besøgne vil se - Tiderne bør være under 500ms for ikke webshops.<br />
                    Anden graf viser loadtider uden cache. Brug grafen til at se hvor meget et nyinstalleret plugin sløver din side - Tiderne bør ligge under 5000 ms for ikke webshops.<br />
                    Tredje graf viser serverens rene php afviklingstider - Tiderne bør ligge under 1 sek.<br /><br />
                    Du kan læse den lange forklaring <a href="https://incloud.dk/serveroptimering-og-svartider-i-incloud-tools/">her</a>, og få gratis hjælp til at optimere din side på InCloud hosting</p>';
        $rvar .= '<p>Bemærk at det kan tage op til 15 minutter fra aktivering, til de første tider begynder at komme ind.</p>';
        return $rvar;
    }

    

}



new InCloudTools;