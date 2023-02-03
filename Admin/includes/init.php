<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

define('SITE_ROOT', DS . 'XAMPP' . DS . 'htdocs' . DS . 'OOP Gallery Project' );

defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'Admin'.DS.'includes');
 

require_once("functions.php");
require_once("session.php");
require_once("database.php");
require_once("db_object.php");
require_once("user.php");
require_once("photo.php");
require_once("comment.php");
require_once("paginate.php");


?>