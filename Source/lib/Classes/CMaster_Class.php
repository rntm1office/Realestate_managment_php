<?php
/**
 * Capital Property Management System
 *
 * File: CMaster_class.php
 * Author: Kris Sherrerd
 * Copyright: 2014 by Kris Sherrerd
 * Version 0.2
 * Modified: 4/15/2014
 */

if(!defined('PMC_INIT')){
    die('Your not suppose to be in here! - Ibid');
}
/**
 * Class CSite
 *
 */
class CMaster {

    /**
     * @description set up the website configurations, settings, etc.
     * @access public
     */
    public function __construct() {
        global $gx_config, $gx_session, $gx_users, $gx_template;

        //loading the config
        $gx_config = new CConfig();
        $this->loadDatabase();

        //determine login status....
        $gx_session = new CSession();
        $gx_users = new CUsers();

        $gx_template = new CTemplate();
    }

    /**
     * Loads the database
     */
    private function loadDatabase(){
        global $gx_config, $gx_db;
        //make a connection to db
        if (isset($gx_config->config["database"])) {
            $gx_db = new CDatabase($gx_config->config["database"]);
        }
        else{
           //Error
        }
    }


    /**
     * @description Configuration is done, run the site.
     */
    function Action() {
        global $gx_session, $gx_TSM, $gx_users;
        if(!$gx_users->checkloggedin()){
            $gx_users->GoLogin();
        }
        //first figure out if we are doing a core action, or a module action
        $site = GetVar('core', false);
        $module = GetVar('mod', false);
        if(!$site && ! $module){
            //display a nice menu template.
        }
        elseif($site && $module){
            //Can't be both, ban the ip, and user
        }

        if($site){
            //find out hte action and make it happen
        }
        elseif($module){
            //get the module and pass control.
        }
    }




}
?>