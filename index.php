<?php 
//test for now 
//to implement unit testing and namespacing later

date_default_timezone_set("Africa/Lagos");
require 'src/LogTrait.php';
require 'src/Logger.php';

$log = new Logger('/var/www/logger/applog.log');
$log->debug("test", "this is a test");