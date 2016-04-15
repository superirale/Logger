<?php 
//test for now 
//

date_default_timezone_set("Africa/Lagos");
require 'src/LogTrait.php';
require 'src/Logger.php';

$log = new Logger('/var/www/logger/applog.log');
$log->debug("test", "this is a test");
$log->LogToConsole("This is a test o", 'info');