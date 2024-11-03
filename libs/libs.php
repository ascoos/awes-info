<?php
/**
 *   __ _  ___  ___ ___   ___   ___     ____ _ __ ___   ___
 *  / _` |/  / / __/ _ \ / _ \ /  /    / __/| '_ ` _ \ /  /
 * | (_| |\  \| (_| (_) | (_) |\  \   | (__ | | | | | |\  \
 *  \__,_|/__/ \___\___/ \___/ /__/    \___\|_| |_| |_|/__/
 * 
 * 
 *************************************************************************************
 * @ASCOOS-NAME        : ASCOOS CMS 24'                                              *
 * @ASCOOS-VERSION     : 24.0.0                                                      *
 * @ASCOOS-CATEGORY    : Kernel (Frontend and Administration Side)                   *
 * @ASCOOS-CREATOR     : Drogidis Christos                                           *
 * @ASCOOS-SITE        : www.ascoos.com                                              *
 * @ASCOOS-LICENSE     : [Commercial] http://docs.ascoos.com/lics/ascoos/AGL-F.html  *
 * @ASCOOS-COPYRIGHT   : Copyright (c) 2007 - 2023, AlexSoft Software.               *
 *************************************************************************************
 *
 * @package             : Ascoos Web Extended Studio  - Servers Status
 * @subpackage          : Libraries 
 * @source             	: /awes-info/libs/libs.php
 * @version            	: 1.0.1
 * @created            	: 2024-10-31 22:00:00 UTC+3
 * @updated            	: 2024-11-03 22:00:00 UTC+3
 * @author             	: Drogidis Christos
 * @authorSite         	: www.alexsoft.gr
 * @license 			: AGL-F
 * 
 * @since PHP 5.6.40
 */

class TAWESInformationLib
{
    private $jsonData;
    public $data;

    public function __construct() 
    {
        global $conf;

        // Read the JSON from the file
        $this->jsonData = @file_get_contents( sprintf($conf->params['url'].'/%s/%s', $conf->params['datapath'], $conf->params['datafile']) );
  
        // Analysis of JSON
        $this->data = @json_decode($this->jsonData, true);
    }



    public function get($section, $key)
    {
        return $this->data[$section][$key];
    }


    public function isRunning($service)
    {
        switch ($service) {
            case 1: return '&#x1F7E2;';    
            case 0: return '&#x1F534;';              
            default: return '&#x1F535;';
        }
    }
    
}    
    

 ?>