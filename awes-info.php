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
 * @source             	: /awes-info/awes-info.php
 * @version            	: 1.0.0
 * @created            	: 2024-10-31 22:00:00 UTC+3
 * @updated            	: 
 * @author             	: Drogidis Christos
 * @authorSite         	: www.alexsoft.gr
 * @license 			: AGL-F
 * 
 * @since PHP 5.6.40
 */

$script_path = str_replace('\\', '/', __DIR__);


require_once($script_path.'/libs/config.php');
require_once($script_path.'/libs/libs.php');



$conf = new TAWESInfornmationConfig;
$lib = new TAWESInformationLib;

require_once($script_path . '/languages//'.$conf->params['lang'].'.php');
$lang = new TAWESInformation_Language;

$text = '';
$text .= '<div class="block-awes-info-'.$conf->params['theme'].'">';
if ($conf->params['show_title']) { 
	$text .= '<div class="header"><h3>'.$lang->title.'</h3></div><div class="clear"></div>';
}
$text .= '<div class="text"><div class="table">';




foreach ($lib->data as $key => $data)
{
	$text .= '<div class="row">';
		$text .= '<div class="cell">'.$lib->isRunning($data['Run']).' '.$key.'</div>';
		$text .= "<div class=\"cell right\">".$data['Version']."</div>";		
	$text .= '</div>'; // row
}
unset($items);

$text .= '</div></div>'; // table/text
$text .= '<div class="more"><a target="_blank" href="https://awes.ascoos.com"><strong>Ascoos Web Extended Studio</strong></a></div>';
$text .= '</div>'; // block
echo $text;
?>
<script type="text/javascript">
<!--
	jQuery(document).ready(function(){
		jQuery('head').append('<link rel="stylesheet" type="text/css" href="<?php echo 'themes/'.$conf->params['theme'].'/theme.css';?>">');
});
//-->
</script>