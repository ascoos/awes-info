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
 * @subpackage          : Upload data file from AWES Server
 * @source             	: /awes-info/upload.php
 * @version            	: 1.0.1
 * @created            	: 2024-10-31 22:00:00 UTC+3
 * @updated            	: 2024-11-03 22:00:00 UTC+3
 * @author             	: Drogidis Christos
 * @authorSite         	: www.alexsoft.gr
 * @license 			: AGL-F
 * 
 * @since PHP 5.6.40
 */

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);

require_once "libs/config.php";
$conf = new TAWESInfornmationConfig;


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
  $target_dir = $conf->params['datapath']."/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Check if the file is INI or JSON
  $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  if ($fileType != "ini" && $fileType != "json") {
    echo "Sorry, only INI and JSON files are allowed.";
    exit;
  }

  // Error detection: We see if the file is cached
  if (!is_uploaded_file($_FILES["file"]["tmp_name"])) {
    echo "Possible file upload attack: " . $_FILES["file"]["name"];
    exit;
  }

  // Upload a file and check if there was a mistake
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    echo "File uploaded successfully: " . basename($_FILES["file"]["name"]);

    // Convert the INI file to JSON.
    if ($fileType == "ini") {
      $ini_array = parse_ini_file($target_file, true);
      if ($ini_array === false) {
        echo "Failed to parse INI file.";
      } else {
        $json_data = json_encode($ini_array, JSON_PRETTY_PRINT);
        if ($json_data === false) {
          echo "Failed to convert to JSON.";
        } else {
          // Correct the file name
          $json_file = $target_dir . pathinfo($target_file, PATHINFO_FILENAME) . '.json';
          if (file_put_contents($json_file, $json_data) === false) {
            echo "Failed to save JSON file.";
          } else {
            echo " and converted to JSON: " . $json_file;
          }
        }
      }
    }
  } else {
    echo "File upload failed. Error code: " . $_FILES["file"]["error"];
  }
} else {
  echo "No file uploaded.";
}
?>
