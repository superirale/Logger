<?php
/**
 * Author: Usman Irale
 * Email: superirale@gmail.com
 * Repo: http://github.com/superirale/Logger
 */
class Logger{
	
	use LogTrait;

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

	public function warning($tag, $message)
	{
		$this->writeLog("Warning", $tag, $message);
	}

	public function LogToConsole($message, $type)
	{
		$this->consoleLog($message, $type);
	}

}