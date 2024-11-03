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
 * @subpackage          : Configuration File
 * @source             	: /awes-info/libs/config.php
 * @version            	: 1.0.1
 * @created            	: 2024-10-31 22:00:00 UTC+3
 * @updated            	: 2024-11-03 22:00:00 UTC+3
 * @author             	: Drogidis Christos
 * @authorSite         	: www.alexsoft.gr
 * @license 			: AGL-F
 * 
 * @since PHP 5.6.40
 */

class TAWESInfornmationConfig {

    public $params = [
        'lang'          => 'en',        // Current Language of package
        'show_title'    => true,        // Show Title in block element.
        'datapath'      => 'data',
        'url'           => 'http://demo.ascoos.com/tests/awes-info', // Remotes saved data
        'datafile'      => 'info.json', // NOT CHANGE
        'show_version'  => false,
        'theme'         => 'cleargray'	// The Block theme        
    ];



}
 
?>