<?php

class Logger{
	
	private $logFile;

	function __construct($file = "/var/log/app_error.log")
	{
		$this->logFile = $file;

		if(!file_exists($this->logFile))
			touch($this->logFile);

		if(!is_writable($this->logFile))
			throw new Exception("Can not write to Log file", 1);
	}

	public function info($tag, $message)
	{
		$this->writeLog("INFO", $tag, $message);
	}

	public function debug($tag, $message)
	{
		$this->writeLog("DEBUG", $tag, $message);
	}

	public function error($tag, $message)
	{
		$this->writeLog("Error", $tag, $message);
	}


	public function writeLog($status, $tag, $message)
	{
		$date = $this->getCurrentTime();
        $msg = "$date: [$tag][$status] - $message" . PHP_EOL;
        file_put_contents($this->logFile, $msg, FILE_APPEND);
	}

	private function getCurrentTime()
	{
		$dt = new DateTime();
	 	return $dt->format('Y-m-d H:i:s');
	}

	// public function __destruct()
 //    {
 //        if($this->logFile) {
 //            fclose($this->logFile);
 //        }
 //    }
}